<?php

namespace Lsp\Protocol\TextDocument\WillSave;

/**
 * A document will save notification is sent from the client to the server before
 * the document is actually saved.
 */
#[\Lsp\Protocol\Notification('textDocument/willSave')]
final class TextDocumentWillSaveNotification {}
