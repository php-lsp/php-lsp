<?php

namespace Lsp\Protocol\Workspace\DidChangeConfiguration;

/**
 * The configuration change notification is sent from the client to the server
 * when the client's configuration has changed. The notification contains
 * the changed configuration as defined by the language client.
 */
#[\Lsp\Protocol\Notification('workspace/didChangeConfiguration')]
final class WorkspaceDidChangeConfigurationNotification {}
