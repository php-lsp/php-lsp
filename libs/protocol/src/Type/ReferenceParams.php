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
     * @generated
     */
    final public function __construct(
        public readonly ReferenceContext $context,
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
