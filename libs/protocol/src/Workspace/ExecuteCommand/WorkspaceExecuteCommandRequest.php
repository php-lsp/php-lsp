<?php

namespace Lsp\Protocol\Workspace\ExecuteCommand;

/**
 * A request send from the client to the server to execute a command. The request might return
 * a workspace edit which the client will apply to the workspace.
 */
#[\Lsp\Protocol\Request('workspace/executeCommand')]
final class WorkspaceExecuteCommandRequest {}
