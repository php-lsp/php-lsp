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
        public readonly bool|null $dynamicRegistration = null,
        public readonly WorkspaceSymbolClientCapabilitiesSymbolKind|null $symbolKind = null,
        public readonly WorkspaceSymbolClientCapabilitiesTagSupport|null $tagSupport = null,
        public readonly WorkspaceSymbolClientCapabilitiesResolveSupport|null $resolveSupport = null,
    ) {}
}