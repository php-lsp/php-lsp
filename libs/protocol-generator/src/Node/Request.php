<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

use Lsp\Protocol\Generator\Node\Request\MessageDirection;
use Lsp\Protocol\Generator\Node\Type\Type;
use Lsp\Protocol\Generator\Node\Type\TypeInterface;

/**
 * Represents a LSP request.
 */
final class Request extends Notification
{
    /**
     * @param non-empty-string $method The request's method name.
     * @param TypeInterface|list<TypeInterface>|null $params The parameter
     *        type(s) if any.
     * @param TypeInterface $result The result type.
     * @param TypeInterface|null $partialResult Optional partial result type if
     *        the request supports partial result reporting.
     * @param TypeInterface|null $errorData An optional error data type.
     * @param non-empty-string|null $registrationMethod Optional a dynamic
     *        registration method if it different from the request's method.
     * @param TypeInterface|null $registrationOptions Optional registration
     *        options if the request supports dynamic registration.
     * @param MessageDirection $messageDirection The direction in which this
     *        request is sent in the protocol.
     * @param non-empty-string|null $documentation An optional documentation.
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
        TypeInterface|array|null $params,
        public TypeInterface $result,
        public ?TypeInterface $partialResult,
        public ?TypeInterface $errorData,
        ?string $registrationMethod,
        ?TypeInterface $registrationOptions,
        MessageDirection $messageDirection,
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
                \array_is_list($params) => \array_map(Type::fromArray(...), $params),
                default => Type::fromArray($params),
            },
            // @phpstan-ignore-next-line
            result: Type::fromArray($data['result']),
            // @phpstan-ignore-next-line
            partialResult: isset($data['partialResult'])
                ? Type::fromArray($data['partialResult'])
                : null,
            // @phpstan-ignore-next-line
            errorData: isset($data['errorData'])
                ? Type::fromArray($data['errorData'])
                : null,
            registrationMethod: $data['registrationMethod'] ?? null,
            registrationOptions: isset($data['registrationOptions'])
                ? Type::fromArray($data['registrationOptions'])
                : null,
            messageDirection: Request\MessageDirection::from($data['messageDirection']),
            documentation: $data['documentation'] ?? null,
            since: $data['since'] ?? null,
            proposed: $data['proposed'] ?? null,
            deprecated: $data['deprecated'] ?? null,
        );
    }
}
