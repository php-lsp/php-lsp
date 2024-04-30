<?php

namespace Lsp\Protocol\Workspace\DidDeleteFiles;

/**
 * The will delete files request is sent from the client to the server before files are actually
 * deleted as long as the deletion is triggered from within the client.
 *
 * @since 3.16.0
 */
#[\Lsp\Protocol\Notification('workspace/didDeleteFiles')]
final class WorkspaceDidDeleteFilesNotification {}
