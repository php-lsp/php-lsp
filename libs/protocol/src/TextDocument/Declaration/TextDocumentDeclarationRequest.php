<?php

namespace Lsp\Protocol\TextDocument\Declaration;

/**
 * A request to resolve the type definition locations of a symbol at a given text
 * document position. The request's parameter is of type {@link TextDocumentPositionParams}
 * the response is of type {@link Declaration} or a typed array of {@link DeclarationLink}
 * or a Thenable that resolves to such.
 */
#[\Lsp\Protocol\Request('textDocument/declaration')]
final class TextDocumentDeclarationRequest {}
