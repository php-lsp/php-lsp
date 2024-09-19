<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link CodeLensRequest}.
 *
 * @generated
 */
final class CodeLensRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use CodeLensOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, bool|null $resolveProvider = null, bool|null $workDoneProgress = null)
    {
            $this->documentSelector = $documentSelector;
    
            $this->resolveProvider = $resolveProvider;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}