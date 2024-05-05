<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in an open text document notification
 *
 * @generated
 */
final class DidOpenTextDocumentParams
{
    final public function __construct(
        public readonly TextDocumentItem $textDocument,
    ) {}
}
