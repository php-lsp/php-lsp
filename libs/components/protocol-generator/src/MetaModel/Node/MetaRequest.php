<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node;

use Lsp\Protocol\Generator\MetaModel\Node\Request\MetaMessageDirection;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaTypeInterface;

/**
 * Represents a LSP request.
 */
final class MetaRequest extends MetaNotification
{
    /**
     * @param non-empty-string $method the request's method name
     * @param MetaTypeInterface|list<MetaTypeInterface>|null $params the parameter
     *        type(s) if any
     * @param MetaTypeInterface $result the result type
     * @param MetaTypeInterface|null $partialResult optional partial result type if
     *        the request supports partial result reporting
     * @param MetaTypeInterface|null $errorData an optional error data type
     * @param non-empty-string|null $registrationMethod optional a dynamic
     *        registration method if it different from the request's method
     * @param MetaTypeInterface|null $registrationOptions optional registration
     *        options if the request supports dynamic registration
     * @param MetaMessageDirection $messageDirection the direction in which this
     *        request is sent in the protocol
     * @param non-empty-string|null $documentation an optional documentation
     * @param non-empty-string|null $since Since when (release number) this
     *        request is available. Is undefined if not known.
     * @param bool|null $proposed Whether this is a proposed feature. If omitted
     *        the feature is final.
     * @param non-empty-string|null $deprecated Whether the request is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
        string $method,
        MetaTypeInterface|array|null $params,
        public MetaTypeInterface $result,
        public ?MetaTypeInterface $partialResult,
        public ?MetaTypeInterface $errorData,
        ?string $registrationMethod,
        ?MetaTypeInterface $registrationOptions,
        MetaMessageDirection $messageDirection,
        ?string $documentation,
        ?string $since,
        ?bool $proposed,
        ?string $deprecated,
    ) {
        parent::__construct(
            method: $method,
            params: $params,
            registrationMethod: $registrationMethod,
            registrationOptions: $registrationOptions,
            messageDirection: $messageDirection,
            documentation: $documentation,
            since: $since,
            proposed: $proposed,
            deprecated: $deprecated,
        );
    }

    public function getSubNodeNames(): array
    {
        return [...parent::getSubNodeNames(), 'result', 'partialResult', 'errorData'];
    }

    public static function fromArray(array $data): self
    {
        $params = $data['params'] ?? null;

        return new self(
            method: $data['method'],
            params: match (true) {
                $params === null => null,
                // @phpstan-ignore-next-line : PHPStan false positive
                \array_is_list($params) => \array_map(MetaType::fromArray(...), $params),
                default => MetaType::fromArray($params),
            },
            // @phpstan-ignore-next-line
            result: MetaType::fromArray($data['result']),
            // @phpstan-ignore-next-line
            partialResult: isset($data['partialResult']) && \is_array($data['partialResult'])
                ? MetaType::fromArray($data['partialResult'])
                : null,
            // @phpstan-ignore-next-line
            errorData: isset($data['errorData']) && \is_array($data['errorData'])
                ? MetaType::fromArray($data['errorData'])
                : null,
            registrationMethod: $data['registrationMethod'] ?? null,
            registrationOptions: isset($data['registrationOptions'])
                ? MetaType::fromArray($data['registrationOptions'])
                : null,
            messageDirection: MetaMessageDirection::from($data['messageDirection']),
            documentation: $data['documentation'] ?? null,
            since: $data['since'] ?? null,
            proposed: $data['proposed'] ?? null,
            deprecated: $data['deprecated'] ?? null,
        );
    }
}
