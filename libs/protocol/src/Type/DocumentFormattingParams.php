<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link DocumentFormattingRequest}.
 *
 * @generated
 */
final class DocumentFormattingParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly FormattingOptions $options,
        int|string $workDoneToken,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
