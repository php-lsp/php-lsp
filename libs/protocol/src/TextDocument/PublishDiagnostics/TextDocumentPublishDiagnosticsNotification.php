<?php

namespace Lsp\Protocol\TextDocument\PublishDiagnostics;

/**
 * Diagnostics notification are sent from the server to the client to signal
 * results of validation runs.
 */
#[\Lsp\Protocol\Notification('textDocument/publishDiagnostics')]
final class TextDocumentPublishDiagnosticsNotification {}
