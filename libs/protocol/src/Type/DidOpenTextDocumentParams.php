<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in an open text document notification.
 *
 * @generated 2024-11-15
 */
final class DidOpenTextDocumentParams
{
    public function __construct(
        /**
         * The document that was opened.
         */
        public readonly TextDocumentItem $textDocument,
    ) {}
}
