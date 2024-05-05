<?php

namespace Lsp\Protocol\Type;

/**
 * A parameter literal used in requests to pass a text document and a position inside that
 * document.
 *
 * @generated
 */
class TextDocumentPositionParams
{
    use TextDocumentPositionParamsMixin;

    public function __construct(TextDocumentIdentifier $textDocument, Position $position)
    {
        $this->textDocument = $textDocument;

        $this->position = $position;
    }
}
