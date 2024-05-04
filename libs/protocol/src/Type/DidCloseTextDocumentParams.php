<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in a close text document notification
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DidCloseTextDocumentParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
    ) {}
}
