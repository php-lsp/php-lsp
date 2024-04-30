<?php

namespace Lsp\Protocol\TextDocument\DidChange;

/**
 * The document change notification is sent from the client to the server to signal
 * changes to a text document.
 */
#[\Lsp\Protocol\Notification('textDocument/didChange')]
final class TextDocumentDidChangeNotification {}
