<?php

namespace Lsp\Protocol\TextDocument\TypeDefinition;

/**
 * A request to resolve the type definition locations of a symbol at a given text
 * document position. The request's parameter is of type {@link TextDocumentPositionParams}
 * the response is of type {@link Definition} or a Thenable that resolves to such.
 */
#[\Lsp\Protocol\Request('textDocument/typeDefinition')]
final class TextDocumentTypeDefinitionRequest {}
