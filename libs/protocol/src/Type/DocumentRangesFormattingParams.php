<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link DocumentRangesFormattingRequest}.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 *
 * @generated 2024-09-21
 */
final class DocumentRangesFormattingParams
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
         * The format options.
         */
        public readonly FormattingOptions $options,
        /**
         * The ranges to format.
         *
         * @var list<Range>
         */
        public readonly array $ranges = [],
        int|string|null $workDoneToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
