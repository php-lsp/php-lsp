<?php

namespace Lsp\Protocol\Type;

trait TextDocumentPositionParamsMixin
{
    /**
     * The text document.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly TextDocumentIdentifier $textDocument;

    /**
     * The position inside the text document.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly Position $position;
}
