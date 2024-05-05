<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link DocumentLinkRequest}.
 *
 * @generated
 */
final class DocumentLinkParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @generated
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        int|string $workDoneToken,
        int|string $partialResultToken,
    ) {
        $this->workDoneToken = $workDoneToken;

        $this->partialResultToken = $partialResultToken;
    }
}
