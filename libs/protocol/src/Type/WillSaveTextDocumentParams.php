<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in a will save text document notification.
 *
 * @generated
 */
final class WillSaveTextDocumentParams
{
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly TextDocumentSaveReason $reason,
    ) {}
}
