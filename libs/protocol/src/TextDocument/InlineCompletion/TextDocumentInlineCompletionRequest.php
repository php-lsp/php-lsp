<?php

namespace Lsp\Protocol\TextDocument\InlineCompletion;

/**
 * A request to provide inline completions in a document. The request's parameter is of
 * type {@link InlineCompletionParams}, the response is of type
 * {@link InlineCompletion InlineCompletion[]} or a Thenable that resolves to such.
 *
 * @since 3.18.0
 * @internal This notification class is not standardized
 */
#[\Lsp\Protocol\Request('textDocument/inlineCompletion')]
final class TextDocumentInlineCompletionRequest {}
