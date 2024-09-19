<?php

namespace Lsp\Protocol\Type;

/**
 * Parameters for a {@link ReferencesRequest}.
 *
 * @generated
 */
final class ReferenceParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    use TextDocumentPositionParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken
     */
    final public function __construct(
        public readonly ReferenceContext $context,
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