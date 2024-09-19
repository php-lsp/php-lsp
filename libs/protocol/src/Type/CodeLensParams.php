<?php

namespace Lsp\Protocol\Type;

/**
 * The parameters of a {@link CodeLensRequest}.
 *
 * @generated
 */
final class CodeLensParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
            $this->workDoneToken = $workDoneToken;
    
            $this->partialResultToken = $partialResultToken;
    }
}