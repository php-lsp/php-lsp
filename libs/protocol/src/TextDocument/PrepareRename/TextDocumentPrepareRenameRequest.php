<?php

namespace Lsp\Protocol\TextDocument\PrepareRename;

/**
 * A request to test and perform the setup necessary for a rename.
 *
 * @since 3.16 - support for default behavior
 */
#[\Lsp\Protocol\Request('textDocument/prepareRename')]
final class TextDocumentPrepareRenameRequest {}
