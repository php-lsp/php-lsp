<?php

namespace Lsp\Protocol\Type;

/**
 * The result returned from an initialize request.
 *
 * @generated
 */
final class InitializeResult
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly ServerCapabilities $capabilities,
        public readonly object $serverInfo,
    ) {}
}
