<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
final class DeclarationRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use DeclarationOptionsMixin;

    use TextDocumentRegistrationOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, bool|null $workDoneProgress = null, string|null $id = null)
    {
            $this->workDoneProgress = $workDoneProgress;
    
            $this->documentSelector = $documentSelector;
    
            $this->id = $id;
    }
}