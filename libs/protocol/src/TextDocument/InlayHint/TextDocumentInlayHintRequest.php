<?php

namespace Lsp\Protocol\TextDocument\InlayHint;

/**
 * A request to provide inlay hints in a document. The request's parameter is of
 * type {@link InlayHintsParams}, the response is of type
 * {@link InlayHint InlayHint[]} or a Thenable that resolves to such.
 *
 * @since 3.17.0
 */
#[\Lsp\Protocol\Request('textDocument/inlayHint')]
final class TextDocumentInlayHintRequest {}
