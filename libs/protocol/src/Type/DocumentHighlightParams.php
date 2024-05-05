<?php

namespace Lsp\Protocol\Type;

/**
 * Parameters for a {@link DocumentHighlightRequest}.
 *
 * @generated
 */
final class DocumentHighlightParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    use TextDocumentPositionParamsMixin;

    /**
     * @generated
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
