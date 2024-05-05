<?php

namespace Lsp\Protocol\Type;

/**
 * Parameters for a {@link DefinitionRequest}.
 *
 * @generated
 */
final class DefinitionParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    use TextDocumentPositionParamsMixin;

    /**
     * @generated
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     * @param int<-2147483648, 2147483647>|string $partialResultToken
     */
    final public function __construct(
        TextDocumentIdentifier $textDocument,
        Position $position,
        int|string $workDoneToken,
        int|string $partialResultToken,
    ) {
        $this->textDocument = $textDocument;

        $this->position = $position;

        $this->workDoneToken = $workDoneToken;

        $this->partialResultToken = $partialResultToken;
    }
}
