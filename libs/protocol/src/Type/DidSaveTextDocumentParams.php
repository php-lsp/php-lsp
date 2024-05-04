<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in a save text document notification
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DidSaveTextDocumentParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly string $text,
    ) {}
}
