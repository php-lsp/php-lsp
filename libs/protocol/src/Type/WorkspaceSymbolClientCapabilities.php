<?php

namespace Lsp\Protocol\Type;

/**
 * Client capabilities for a {@link WorkspaceSymbolRequest}.
 *
 * @generated
 */
final class WorkspaceSymbolClientCapabilities
{
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly WorkspaceSymbolClientCapabilitiesSymbolKind $symbolKind,
        public readonly WorkspaceSymbolClientCapabilitiesTagSupport $tagSupport,
        public readonly WorkspaceSymbolClientCapabilitiesResolveSupport $resolveSupport,
    ) {}
}