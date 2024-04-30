<?php

namespace Lsp\Protocol\WorkspaceSymbol\Resolve;

/**
 * A request to resolve the range inside the workspace
 * symbol's location.
 *
 * @since 3.17.0
 */
#[\Lsp\Protocol\Request('workspaceSymbol/resolve')]
final class WorkspaceSymbolResolveRequest {}
