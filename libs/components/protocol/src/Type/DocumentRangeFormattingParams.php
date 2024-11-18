<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link DocumentRangeFormattingRequest}.
 */
final class DocumentRangeFormattingParams
{
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
        /**
         * An optional token that a server can use to report work done progress.
         *
         * @var int<-2147483648, 2147483647>|string|null
         */
        public readonly int|string|null $workDoneToken = null,
    ) {}
}
