<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Information about the client.
 *
 * @since 3.18.0 ClientInfo type name added.
 *
 * @generated 2024-11-15
 */
final class ClientInfo
{
    public function __construct(
        /**
         * The name of the client as defined by the client.
         */
        public readonly string $name,
        /**
         * The client's version as defined by the client.
         */
        public readonly ?string $version = null,
    ) {}
}
