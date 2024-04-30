<?php

namespace Lsp\Protocol\TextDocument\RangesFormatting;

/**
 * A request to format ranges in a document.
 *
 * @since 3.18.0
 * @internal This notification class is not standardized
 */
#[\Lsp\Protocol\Request('textDocument/rangesFormatting')]
final class TextDocumentRangesFormattingRequest {}
