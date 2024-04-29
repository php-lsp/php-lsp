<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

use Lsp\Protocol\Generator\Node\Request\MessageDirection;
use Lsp\Protocol\Generator\Node\Type\TypeInterface;

/**
 * Represents a LSP notification.
 */
final class Notification
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
     * @param string|null $documentation An optional documentation.
     * @param non-empty-string|null $since Since when (release number) this
     *        notification is available. Is undefined if not known.
     * @param bool|null $proposed Whether this is a proposed notification.
     *        If omitted the notification is final.
     * @param non-empty-string|null $deprecated Whether the notification is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
        public readonly string $method,
        public readonly TypeInterface|array|null $params,
        public readonly ?string $registrationMethod,
        public readonly ?TypeInterface $registrationOptions,
        public readonly MessageDirection $messageDirection,
        public readonly ?string $documentation,
        public readonly ?string $since,
        public readonly ?bool $proposed,
        public readonly ?string $deprecated,
    ) {}
}
