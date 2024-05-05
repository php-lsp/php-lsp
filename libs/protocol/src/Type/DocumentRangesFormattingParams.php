<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link DocumentRangesFormattingRequest}.
 *
 * @generated
 * @since 3.18.0
 * @internal Describes the upcoming version of the Language Server Protocol and is under development
 */
final class DocumentRangesFormattingParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @param list<Range> $ranges
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly array $ranges,
        public readonly FormattingOptions $options,
        int|string $workDoneToken,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
