<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class InitializeResultServerInfo
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
