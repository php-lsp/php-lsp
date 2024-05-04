<?php

namespace Lsp\Protocol\Type;

/**
 * The parameter of a `textDocument/prepareCallHierarchy` request.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class CallHierarchyPrepareParams
{
    use WorkDoneProgressParamsMixin;

    use TextDocumentPositionParamsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     */
    final public function __construct(TextDocumentIdentifier $textDocument, Position $position, int|string $workDoneToken)
    {
        $this->textDocument = $textDocument;

        $this->position = $position;

        $this->workDoneToken = $workDoneToken;
    }
}
