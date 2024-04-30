<?php

namespace Lsp\Protocol\Workspace\WorkspaceFolders;

/**
 * The `workspace/workspaceFolders` is sent from the server to the client to fetch the open workspace folders.
 */
#[\Lsp\Protocol\Request('workspace/workspaceFolders')]
final class WorkspaceWorkspaceFoldersRequest {}
