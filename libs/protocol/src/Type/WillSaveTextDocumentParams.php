<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in a will save text document notification.
 *
 * @generated 2024-09-21
 */
final class WillSaveTextDocumentParams
{
    public function __construct(
        /**
         * The document that will be saved.
         */
        public readonly TextDocumentIdentifier $textDocument,
        /**
         * The 'TextDocumentSaveReason'.
         */
        public readonly TextDocumentSaveReason $reason,
    ) {}
}
