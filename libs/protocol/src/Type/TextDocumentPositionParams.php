<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A parameter literal used in requests to pass a text document and a position
 * inside that document.
 *
 * @generated 2024-09-21
 */
final class TextDocumentPositionParams
{
    use TextDocumentPositionParamsMixin;

    /**
     * @param TextDocumentIdentifier $textDocument the text document
     * @param Position $position the position inside the text document
     */
    public function __construct(TextDocumentIdentifier $textDocument, Position $position)
    {
        $this->textDocument = $textDocument;
        $this->position = $position;
    }
}
