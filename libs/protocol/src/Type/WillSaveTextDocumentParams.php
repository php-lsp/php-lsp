<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in a will save text document notification.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class WillSaveTextDocumentParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly TextDocumentSaveReason $reason,
    ) {}
}
