<?php

namespace Lsp\Protocol\Type;

/**
 * A parameter literal used in inline value requests.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class InlineValueParams
{
    use WorkDoneProgressParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
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
