<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
final class ImplementationParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    use TextDocumentPositionParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
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
