<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link DocumentRangeFormattingRequest}.
 *
 * @generated
 */
final class DocumentRangeFormattingParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly Range $range,
        public readonly FormattingOptions $options,
        int|string $workDoneToken,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
