<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class DocumentColorRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    use DocumentColorOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, bool|null $workDoneProgress = null, string|null $id = null)
    {
            $this->documentSelector = $documentSelector;
    
            $this->workDoneProgress = $workDoneProgress;
    
            $this->id = $id;
    }
}