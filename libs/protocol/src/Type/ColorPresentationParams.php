<?php

namespace Lsp\Protocol\Type;

/**
 * Parameters for a {@link ColorPresentationRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class ColorPresentationParams
{
    use WorkDoneProgressParamsMixin;

    use PartialResultParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
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
