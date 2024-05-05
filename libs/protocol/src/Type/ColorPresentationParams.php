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
     * @generated
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly Color $color,
        public readonly Range $range,
        int|string $workDoneToken,
        int|string $partialResultToken,
    ) {
        $this->workDoneToken = $workDoneToken;

        $this->partialResultToken = $partialResultToken;
    }
}
