<?php

namespace Lsp\Protocol\Type;

/**
 * Parameters for a {@link SignatureHelpRequest}.
 *
 * @generated
 */
final class SignatureHelpParams
{
    use WorkDoneProgressParamsMixin;

    use TextDocumentPositionParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     */
    final public function __construct(
        TextDocumentIdentifier $textDocument,
        Position $position,
        public readonly SignatureHelpContext|null $context = null,
        int|string|null $workDoneToken = null,
    ) {
            $this->textDocument = $textDocument;
    
            $this->position = $position;
    
            $this->workDoneToken = $workDoneToken;
    }
}