<?php

namespace Lsp\Protocol\Workspace\DidCreateFiles;

/**
 * The did create files notification is sent from the client to the server when
 * files were created from within the client.
 *
 * @since 3.16.0
 */
#[\Lsp\Protocol\Notification('workspace/didCreateFiles')]
final class WorkspaceDidCreateFilesNotification {}
