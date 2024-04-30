<?php

namespace Lsp\Protocol\TextDocument\SelectionRange;

/**
 * A request to provide selection ranges in a document. The request's
 * parameter is of type {@link SelectionRangeParams}, the
 * response is of type {@link SelectionRange SelectionRange[]} or a Thenable
 * that resolves to such.
 */
#[\Lsp\Protocol\Request('textDocument/selectionRange')]
final class TextDocumentSelectionRangeRequest {}
