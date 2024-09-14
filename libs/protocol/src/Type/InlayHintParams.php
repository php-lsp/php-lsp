<?php

namespace Lsp\Protocol\Type;

/**
 * A parameter literal used in inlay hint requests.
 *
 * @generated
 *
 * @since 3.17.0
 */
final class InlayHintParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly Range $range,
        int|string $workDoneToken,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
