<?php

namespace Lsp\Protocol\Workspace\DidChangeWorkspaceFolders;

/**
 * The `workspace/didChangeWorkspaceFolders` notification is sent from the client to the server when the workspace
 * folder configuration changes.
 */
#[\Lsp\Protocol\Notification('workspace/didChangeWorkspaceFolders')]
final class WorkspaceDidChangeWorkspaceFoldersNotification {}
