<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentHighlightRequest}.
 *
 * @generated
 */
final class DocumentHighlightRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use DocumentHighlightOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, bool|null $workDoneProgress = null)
    {
            $this->documentSelector = $documentSelector;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}