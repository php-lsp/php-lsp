<?php

namespace Lsp\Protocol\Type;

/**
 * A parameter literal used in inline completion requests.
 *
 * @generated
 * @since 3.18.0
 * @internal Describes the upcoming version of the Language Server Protocol and is under development
 */
final class InlineCompletionParams
{
    use WorkDoneProgressParamsMixin;

    use TextDocumentPositionParamsMixin;

    /**
     * @generated
     * @since 3.18.0
     * @internal Describes the upcoming version of the Language Server Protocol and is under development
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     */
    final public function __construct(
        public readonly InlineCompletionContext $context,
        TextDocumentIdentifier $textDocument,
        Position $position,
        int|string $workDoneToken,
    ) {
        $this->textDocument = $textDocument;

        $this->position = $position;

        $this->workDoneToken = $workDoneToken;
    }
}
