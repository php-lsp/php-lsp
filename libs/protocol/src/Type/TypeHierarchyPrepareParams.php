<?php

namespace Lsp\Protocol\Type;

/**
 * The parameter of a `textDocument/prepareTypeHierarchy` request.
 *
 * @generated
 * @since 3.17.0
 */
final class TypeHierarchyPrepareParams
{
    use WorkDoneProgressParamsMixin;

    use TextDocumentPositionParamsMixin;

    /**
     * @generated
     * @since 3.17.0
     * @param int<-2147483648, 2147483647>|string $workDoneToken
     */
    final public function __construct(TextDocumentIdentifier $textDocument, Position $position, int|string $workDoneToken)
    {
        $this->textDocument = $textDocument;

        $this->position = $position;

        $this->workDoneToken = $workDoneToken;
    }
}
