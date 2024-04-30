<?php

namespace Lsp\Protocol\TextDocument\References;

/**
 * A request to resolve project-wide references for the symbol denoted
 * by the given text document position. The request's parameter is of
 * type {@link ReferenceParams} the response is of type
 * {@link Location Location[]} or a Thenable that resolves to such.
 */
#[\Lsp\Protocol\Request('textDocument/references')]
final class TextDocumentReferencesRequest {}
