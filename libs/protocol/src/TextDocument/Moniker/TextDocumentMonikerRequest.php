<?php

namespace Lsp\Protocol\TextDocument\Moniker;

/**
 * A request to get the moniker of a symbol at a given text document position.
 * The request parameter is of type {@link TextDocumentPositionParams}.
 * The response is of type {@link Moniker Moniker[]} or `null`.
 */
#[\Lsp\Protocol\Request('textDocument/moniker')]
final class TextDocumentMonikerRequest {}
