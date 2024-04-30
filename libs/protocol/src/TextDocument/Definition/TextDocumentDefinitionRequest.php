<?php

namespace Lsp\Protocol\TextDocument\Definition;

/**
 * A request to resolve the definition location of a symbol at a given text
 * document position. The request's parameter is of type {@link TextDocumentPosition}
 * the response is of either type {@link Definition} or a typed array of
 * {@link DefinitionLink} or a Thenable that resolves to such.
 */
#[\Lsp\Protocol\Request('textDocument/definition')]
final class TextDocumentDefinitionRequest {}
