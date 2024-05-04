<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link DocumentFormattingRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DocumentFormattingParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly FormattingOptions $options,
        int|string $workDoneToken,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
