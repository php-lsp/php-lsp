<?php

namespace Lsp\Protocol\TextDocument\FoldingRange;

/**
 * A request to provide folding ranges in a document. The request's
 * parameter is of type {@link FoldingRangeParams}, the
 * response is of type {@link FoldingRangeList} or a Thenable
 * that resolves to such.
 */
#[\Lsp\Protocol\Request('textDocument/foldingRange')]
final class TextDocumentFoldingRangeRequest {}
