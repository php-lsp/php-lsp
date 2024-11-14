<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A parameter literal used in requests to pass a text document and a position
 * inside that document.
 *
 * @generated 2024-11-14
 */
trait TextDocumentPositionParamsMixin
{
    /**
     * The text document.
     */
    public readonly TextDocumentIdentifier $textDocument;
    /**
     * The position inside the text document.
     */
    public readonly Position $position;
}
