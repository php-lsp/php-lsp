<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Information about the server.
 *
 * @since 3.18.0 ServerInfo type name added.
 *
 * @generated 2024-11-15
 */
final class ServerInfo
{
    public function __construct(
        /**
         * The name of the server as defined by the server.
         */
        public readonly string $name,
        /**
         * The server's version as defined by the server.
         */
        public readonly ?string $version = null,
    ) {}
}
