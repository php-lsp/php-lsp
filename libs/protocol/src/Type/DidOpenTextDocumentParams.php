<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in an open text document notification
 *
 * @generated
 */
final class DidOpenTextDocumentParams
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly TextDocumentItem $textDocument,
    ) {}
}
