<?php

namespace Lsp\Protocol\Type;

/**
 * A parameter literal used in requests to pass a text document and a position inside that
 * document.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class TextDocumentPositionParams
{
    use TextDocumentPositionParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    public function __construct(TextDocumentIdentifier $textDocument, Position $position)
    {
        $this->textDocument = $textDocument;

        $this->position = $position;
    }
}
