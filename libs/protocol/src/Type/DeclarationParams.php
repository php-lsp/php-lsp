<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class DeclarationParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    use TextDocumentPositionParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken
     */
    final public function __construct(
        TextDocumentIdentifier $textDocument,
        Position $position,
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
            $this->textDocument = $textDocument;
    
            $this->position = $position;
    
            $this->workDoneToken = $workDoneToken;
    
            $this->partialResultToken = $partialResultToken;
    }
}