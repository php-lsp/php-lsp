<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

use Lsp\Protocol\Generator\Node\Request\MessageDirection;
use Lsp\Protocol\Generator\Node\Type\Type;
use Lsp\Protocol\Generator\Node\Type\TypeInterface;

/**
 * Represents a LSP request.
 */
final class Request extends Node
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
        public string $method,
        public TypeInterface|array|null $params,
        public TypeInterface $result,
        public ?TypeInterface $partialResult,
        public ?TypeInterface $errorData,
        public ?string $registrationMethod,
        public ?TypeInterface $registrationOptions,
        public MessageDirection $messageDirection,
        public ?string $documentation,
        public ?string $since,
        public ?bool $proposed,
        public ?string $deprecated,
    ) {
        parent::__construct();
    }

    public function getSubNodeNames(): array
    {
        return ['params', 'result', 'partialResult', 'errorData', 'registrationOptions'];
    }

    /**
     * @param array{
     *     method: non-empty-string,
     *     params?: array<array-key, mixed>,
     *     result: array<array-key, mixed>,
     *     partialResult?: array<array-key, mixed>,
     *     errorData?: array<array-key, mixed>,
     *     registrationMethod?: non-empty-string,
     *     registrationOptions?: array<array-key, mixed>,
     *     messageDirection: non-empty-string,
     *     documentation?: non-empty-string,
     *     since?: non-empty-string,
     *     proposed?: bool,
     *     deprecated?: non-empty-string,
     * } $data
     */
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
            result: Type::fromArray($data['result']),
            partialResult: isset($data['partialResult'])
                ? Type::fromArray($data['partialResult'])
                : null,
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
