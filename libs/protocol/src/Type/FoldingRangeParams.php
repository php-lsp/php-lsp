<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Parameters for a {@link FoldingRangeRequest}.
 *
 * @generated 2024-09-21
 */
final class FoldingRangeParams
{
    use WorkDoneProgressParamsMixin;
    use PartialResultParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken an
     *        optional token that a server can use to report work done progress
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken An
     *        optional token that a server can use to report partial results (e.g.
     *        streaming) to the client.
     */
    public function __construct(
        /**
         * The text document.
         */
        public readonly TextDocumentIdentifier $textDocument,
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
        $this->partialResultToken = $partialResultToken;
    }
}
