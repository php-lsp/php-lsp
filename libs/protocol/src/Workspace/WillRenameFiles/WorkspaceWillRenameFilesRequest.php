<?php

namespace Lsp\Protocol\Workspace\WillRenameFiles;

/**
 * The will rename files request is sent from the client to the server before files are actually
 * renamed as long as the rename is triggered from within the client.
 *
 * @since 3.16.0
 */
#[\Lsp\Protocol\Request('workspace/willRenameFiles')]
final class WorkspaceWillRenameFilesRequest {}
