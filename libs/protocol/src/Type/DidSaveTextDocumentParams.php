<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in a save text document notification
 *
 * @generated
 */
final class DidSaveTextDocumentParams
{
    /**
     * @generated
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly string $text,
    ) {}
}
