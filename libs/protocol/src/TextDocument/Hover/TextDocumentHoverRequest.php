<?php

namespace Lsp\Protocol\TextDocument\Hover;

/**
 * Request to request hover information at a given text document position. The request's
 * parameter is of type {@link TextDocumentPosition} the response is of
 * type {@link Hover} or a Thenable that resolves to such.
 */
#[\Lsp\Protocol\Request('textDocument/hover')]
final class TextDocumentHoverRequest {}
