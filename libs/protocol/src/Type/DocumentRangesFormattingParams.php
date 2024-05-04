<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link DocumentRangesFormattingRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.18.0
 * @internal Describes the upcoming version of the Language Server Protocol and is under development
 */
final class DocumentRangesFormattingParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.18.0
     * @internal Describes the upcoming version of the Language Server Protocol and is under development
     * @param list<Range> $ranges
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
