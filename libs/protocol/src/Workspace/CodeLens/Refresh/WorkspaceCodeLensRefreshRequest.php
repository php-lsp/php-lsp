<?php

namespace Lsp\Protocol\Workspace\CodeLens\Refresh;

/**
 * A request to refresh all code actions
 *
 * @since 3.16.0
 */
#[\Lsp\Protocol\Request('workspace/codeLens/refresh')]
final class WorkspaceCodeLensRefreshRequest {}
