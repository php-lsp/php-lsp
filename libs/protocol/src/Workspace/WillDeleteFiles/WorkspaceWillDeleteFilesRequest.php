<?php

namespace Lsp\Protocol\Workspace\WillDeleteFiles;

/**
 * The did delete files notification is sent from the client to the server when
 * files were deleted from within the client.
 *
 * @since 3.16.0
 */
#[\Lsp\Protocol\Request('workspace/willDeleteFiles')]
final class WorkspaceWillDeleteFilesRequest {}
