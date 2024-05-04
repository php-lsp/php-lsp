<?php

namespace Lsp\Protocol\Type;

/**
 * Client capabilities for a {@link WorkspaceSymbolRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class WorkspaceSymbolClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly object $symbolKind,
        public readonly object $tagSupport,
        public readonly object $resolveSupport,
    ) {}
}
