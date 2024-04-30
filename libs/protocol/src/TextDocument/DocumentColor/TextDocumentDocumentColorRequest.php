<?php

namespace Lsp\Protocol\TextDocument\DocumentColor;

/**
 * A request to list all color symbols found in a given text document. The request's
 * parameter is of type {@link DocumentColorParams} the
 * response is of type {@link ColorInformation ColorInformation[]} or a Thenable
 * that resolves to such.
 */
#[\Lsp\Protocol\Request('textDocument/documentColor')]
final class TextDocumentDocumentColorRequest {}
