<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

use Lsp\Protocol\Generator\Node\Request\MessageDirection;
use Lsp\Protocol\Generator\Node\Type\Type;
use Lsp\Protocol\Generator\Node\Type\TypeInterface;

/**
 * Represents a LSP notification.
 */
class Notification extends Definition
{
    /**
     * @param non-empty-string $method The request's method name.
     * @param TypeInterface|list<TypeInterface>|null $params The parameter
     *        type(s) if any.
     * @param non-empty-string|null $registrationMethod Optional a dynamic
     *        registration method if it different from the request's method.
     * @param TypeInterface|null $registrationOptions Optional registration
     *        options if the notification supports dynamic registration.
     * @param MessageDirection $messageDirection The direction in which this
     *        notification is sent in the protocol.
     * @param non-empty-string|null $documentation An optional documentation.
     * @param non-empty-string|null $since Since when (release number) this
     *        notification is available. Is undefined if not known.
     * @param bool|null $proposed Whether this is a proposed notification.
     *        If omitted the notification is final.
     * @param non-empty-string|null $deprecated Whether the notification is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
        public string $method,
        public TypeInterface|array|null $params,
        public ?string $registrationMethod,
        public ?TypeInterface $registrationOptions,
        public MessageDirection $messageDirection,
        ?string $documentation,
        ?string $since,
        ?bool $proposed,
        ?string $deprecated,
    ) {
        parent::__construct(
            documentation: $documentation,
            since: $since,
            proposed: $proposed,
            deprecated: $deprecated,
        );
    }

    public function getSubNodeNames(): array
    {
        return ['params', 'registrationOptions'];
    }

    /**
     * @param array{
     *     method: non-empty-string,
     *     params?: array<array-key, mixed>,
     *     registrationMethod?: non-empty-string,
     *     registrationOptions?: array<array-key, mixed>,
     *     messageDirection: non-empty-string,
     *     documentation?: non-empty-string,
     *     since?: non-empty-string,
     *     proposed?: bool,
     *     deprecated?: non-empty-string,
     *     ...
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
