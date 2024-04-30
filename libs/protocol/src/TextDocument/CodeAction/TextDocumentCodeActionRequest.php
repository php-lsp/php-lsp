<?php

namespace Lsp\Protocol\TextDocument\CodeAction;

/**
 * A request to provide commands for the given text document and range.
 */
#[\Lsp\Protocol\Request('textDocument/codeAction')]
final class TextDocumentCodeActionRequest {}
