<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link CodeActionRequest}.
 *
 * @generated
 */
final class CodeActionParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     * @param int<-2147483648, 2147483647>|string $partialResultToken
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
