<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A parameter literal used in inlay hint requests.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class InlayHintParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken an
     *        optional token that a server can use to report work done progress
     */
    public function __construct(
        /**
         * The text document.
         */
        public readonly TextDocumentIdentifier $textDocument,
        /**
         * The document range for which inlay hints should be computed.
         */
        public readonly Range $range,
        int|string|null $workDoneToken = null,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
