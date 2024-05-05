<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link DocumentLinkRequest}.
 *
 * @generated
 */
final class DocumentLinkRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use DocumentLinkOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, bool $resolveProvider, bool $workDoneProgress)
    {
            $this->documentSelector = $documentSelector;
    
            $this->resolveProvider = $resolveProvider;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}