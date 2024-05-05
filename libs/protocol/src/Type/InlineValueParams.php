<?php

namespace Lsp\Protocol\Type;

/**
 * A parameter literal used in inline value requests.
 *
 * @generated
 * @since 3.17.0
 */
final class InlineValueParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @generated
     * @since 3.17.0
     */
    final public function __construct(
        public readonly TextDocumentIdentifier $textDocument,
        public readonly Range $range,
        public readonly InlineValueContext $context,
        int|string $workDoneToken,
    ) {
        $this->workDoneToken = $workDoneToken;
    }
}
