<?php

namespace Lsp\Protocol\TextDocument\LinkedEditingRange;

/**
 * A request to provide ranges that can be edited together.
 *
 * @since 3.16.0
 */
#[\Lsp\Protocol\Request('textDocument/linkedEditingRange')]
final class TextDocumentLinkedEditingRangeRequest {}
