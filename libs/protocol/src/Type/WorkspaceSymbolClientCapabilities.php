<?php

namespace Lsp\Protocol\Type;

/**
 * Client capabilities for a {@link WorkspaceSymbolRequest}.
 *
 * @generated
 */
final class WorkspaceSymbolClientCapabilities
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly object $symbolKind,
        public readonly object $tagSupport,
        public readonly object $resolveSupport,
    ) {}
}
