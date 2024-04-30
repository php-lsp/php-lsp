<?php

namespace Lsp\Protocol\TextDocument\DocumentSymbol;

/**
 * A request to list all symbols found in a given text document. The request's
 * parameter is of type {@link TextDocumentIdentifier} the
 * response is of type {@link SymbolInformation SymbolInformation[]} or a Thenable
 * that resolves to such.
 */
#[\Lsp\Protocol\Request('textDocument/documentSymbol')]
final class TextDocumentDocumentSymbolRequest {}
