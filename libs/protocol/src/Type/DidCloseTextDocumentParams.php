<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters sent in a close text document notification
 *
 * @generated
 */
final class DidCloseTextDocumentParams
{
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
    ) {}
}