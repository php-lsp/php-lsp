<?php

namespace Lsp\Protocol\Workspace\DidRenameFiles;

/**
 * The did rename files notification is sent from the client to the server when
 * files were renamed from within the client.
 *
 * @since 3.16.0
 */
#[\Lsp\Protocol\Notification('workspace/didRenameFiles')]
final class WorkspaceDidRenameFilesNotification {}
