<?php

namespace Lsp\Protocol\Workspace\DidChangeWatchedFiles;

/**
 * The watched files notification is sent from the client to the server when
 * the client detects changes to file watched by the language client.
 */
#[\Lsp\Protocol\Notification('workspace/didChangeWatchedFiles')]
final class WorkspaceDidChangeWatchedFilesNotification {}
