<?php

namespace Lsp\Protocol\TextDocument\CodeLens;

/**
 * A request to provide code lens for the given text document.
 */
#[\Lsp\Protocol\Request('textDocument/codeLens')]
final class TextDocumentCodeLensRequest {}
