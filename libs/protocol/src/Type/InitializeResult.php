<?php

namespace Lsp\Protocol\Type;

/**
 * The result returned from an initialize request.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class InitializeResult
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly ServerCapabilities $capabilities,
        public readonly object $serverInfo,
    ) {}
}
