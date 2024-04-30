<?php

namespace Lsp\Protocol\TextDocument\InlineValue;

/**
 * A request to provide inline values in a document. The request's parameter is of
 * type {@link InlineValueParams}, the response is of type
 * {@link InlineValue InlineValue[]} or a Thenable that resolves to such.
 *
 * @since 3.17.0
 */
#[\Lsp\Protocol\Request('textDocument/inlineValue')]
final class TextDocumentInlineValueRequest {}
