<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link ReferencesRequest}.
 *
 * @generated
 */
final class ReferenceRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use ReferenceOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, bool|null $workDoneProgress = null)
    {
            $this->documentSelector = $documentSelector;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}