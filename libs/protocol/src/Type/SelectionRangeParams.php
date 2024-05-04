<?php

namespace Lsp\Protocol\Type;

/**
 * A parameter literal used in selection range requests.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class SelectionRangeParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<Position> $positions
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly array $positions,
        int|string $workDoneToken,
        int|string $partialResultToken,
    ) {
        $this->workDoneToken = $workDoneToken;

        $this->partialResultToken = $partialResultToken;
    }
}
