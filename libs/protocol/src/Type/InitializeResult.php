<?php

namespace Lsp\Protocol\Type;

/**
 * The result returned from an initialize request.
 *
 * @generated
 */
final class InitializeResult
{
    final public function __construct(
        public readonly ServerCapabilities $capabilities,
        public readonly InitializeResultServerInfo $serverInfo,
    ) {}
}