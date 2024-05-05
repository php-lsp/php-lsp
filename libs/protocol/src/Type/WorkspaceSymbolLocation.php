<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @internal This class is an internal dependency of {@see WorkspaceSymbol}
 */
final class WorkspaceSymbolLocation
{
    /**
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly string $uri,
    ) {}
}