<?php

namespace Lsp\Protocol\Type;

/**
 * Parameters for a {@link FoldingRangeRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class FoldingRangeParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        int|string $workDoneToken,
        int|string $partialResultToken,
    ) {
        $this->workDoneToken = $workDoneToken;

        $this->partialResultToken = $partialResultToken;
    }
}
