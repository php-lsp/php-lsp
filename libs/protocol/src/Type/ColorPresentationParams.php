<?php

namespace Lsp\Protocol\Type;

/**
 * Parameters for a {@link ColorPresentationRequest}.
 *
 * @generated
 */
final class ColorPresentationParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     * @param int<-2147483648, 2147483647>|string|null $partialResultToken
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly Color $color,
        public readonly Range $range,
        int|string|null $workDoneToken = null,
        int|string|null $partialResultToken = null,
    ) {
            $this->workDoneToken = $workDoneToken;
    
            $this->partialResultToken = $partialResultToken;
    }
}