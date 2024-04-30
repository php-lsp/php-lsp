<?php

namespace Lsp\Protocol\TextDocument\DidSave;

/**
 * The document save notification is sent from the client to the server when
 * the document got saved in the client.
 */
#[\Lsp\Protocol\Notification('textDocument/didSave')]
final class TextDocumentDidSaveNotification {}
