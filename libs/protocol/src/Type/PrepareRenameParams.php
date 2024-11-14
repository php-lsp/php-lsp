<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class PrepareRenameParams
{
    use TextDocumentPositionParamsMixin;
    use WorkDoneProgressParamsMixin;

    /**
     * @param TextDocumentIdentifier $textDocument the text document
     * @param Position $position the position inside the text document
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken an
     *        optional token that a server can use to report work done progress
     */
    public function __construct(TextDocumentIdentifier $textDocument, Position $position, int|string|null $workDoneToken = null)
    {
        $this->textDocument = $textDocument;
        $this->position = $position;
        $this->workDoneToken = $workDoneToken;
    }
}
