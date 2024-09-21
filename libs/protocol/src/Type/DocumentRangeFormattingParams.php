<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link DocumentRangeFormattingRequest}.
 *
 * @generated 2024-09-21
 */
final class DocumentRangeFormattingParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken an
     *        optional token that a server can use to report work done progress
     */
    public function __construct(
        /**
         * The document to format.
         */
        public readonly TextDocumentIdentifier $textDocument,
        /**
         * The range to format.
         */
        public readonly Range $range,
        /**
         * The format options.
         */
        public readonly FormattingOptions $options,
        int|string|null $workDoneToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
