<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link DocumentFormattingRequest}.
 *
 * @generated 2024-09-21
 */
final class DocumentFormattingParams
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
        int|string|null $workDoneToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
