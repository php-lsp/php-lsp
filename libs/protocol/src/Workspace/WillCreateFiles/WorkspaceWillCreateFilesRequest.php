<?php

namespace Lsp\Protocol\Workspace\WillCreateFiles;

/**
 * The will create files request is sent from the client to the server before files are actually
 * created as long as the creation is triggered from within the client.
 *
 * The request can return a `WorkspaceEdit` which will be applied to workspace before the
 * files are created. Hence the `WorkspaceEdit` can not manipulate the content of the file
 * to be created.
 *
 * @since 3.16.0
 */
#[\Lsp\Protocol\Request('workspace/willCreateFiles')]
final class WorkspaceWillCreateFilesRequest {}
