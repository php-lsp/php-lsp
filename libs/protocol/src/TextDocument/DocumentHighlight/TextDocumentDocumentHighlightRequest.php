<?php

namespace Lsp\Protocol\TextDocument\DocumentHighlight;

/**
 * Request to resolve a {@link DocumentHighlight} for a given
 * text document position. The request's parameter is of type {@link TextDocumentPosition}
 * the request response is an array of type {@link DocumentHighlight}
 * or a Thenable that resolves to such.
 */
#[\Lsp\Protocol\Request('textDocument/documentHighlight')]
final class TextDocumentDocumentHighlightRequest {}
