<?php

namespace Lsp\Protocol\Type;

/**
 * The parameter of a `textDocument/prepareCallHierarchy` request.
 *
 * @generated
 * @since 3.16.0
 */
final class CallHierarchyPrepareParams
{
    use WorkDoneProgressParamsMixin;

    use TextDocumentPositionParamsMixin;

    /**
     * @param int<-2147483648, 2147483647>|string|null $workDoneToken
     */
    final public function __construct(TextDocumentIdentifier $textDocument, Position $position, int|string|null $workDoneToken = null)
    {
            $this->textDocument = $textDocument;
    
            $this->position = $position;
    
            $this->workDoneToken = $workDoneToken;
    }
}