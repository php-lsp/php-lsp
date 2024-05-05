<?php

namespace Lsp\Protocol\Type;

trait TextDocumentPositionParamsMixin
{
    /**
     * The text document.
     *
     * @generated
     */
    public readonly TextDocumentIdentifier $textDocument;

    /**
     * The position inside the text document.
     *
     * @generated
     */
    public readonly Position $position;
}
