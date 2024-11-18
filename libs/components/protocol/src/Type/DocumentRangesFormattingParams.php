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
 */
final class DocumentRangesFormattingParams
{
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
        /**
         * An optional token that a server can use to report work done progress.
         *
         * @var int<-2147483648, 2147483647>|string|null
         */
        public readonly int|string|null $workDoneToken = null,
    ) {}
}
