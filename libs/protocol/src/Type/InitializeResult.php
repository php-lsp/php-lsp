<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The result returned from an initialize request.
 *
 * @generated 2024-11-15
 */
final class InitializeResult
{
    public function __construct(
        /**
         * The capabilities the language server provides.
         */
        public readonly ServerCapabilities $capabilities,
        /**
         * Information about the server.
         *
         * @since 3.15.0
         */
        public readonly ?ServerInfo $serverInfo = null,
    ) {}
}
