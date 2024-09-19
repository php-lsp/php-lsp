<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link RenameRequest}.
 *
 * @generated
 */
final class RenameRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use RenameOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, bool|null $prepareProvider = null, bool|null $workDoneProgress = null)
    {
            $this->documentSelector = $documentSelector;
    
            $this->prepareProvider = $prepareProvider;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}