<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link CodeActionRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class CodeActionParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly Range $range,
        public readonly CodeActionContext $context,
        int|string $workDoneToken,
        int|string $partialResultToken,
    ) {
        $this->workDoneToken = $workDoneToken;

        $this->partialResultToken = $partialResultToken;
    }
}
