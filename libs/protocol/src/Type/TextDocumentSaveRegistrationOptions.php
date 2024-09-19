<?php

namespace Lsp\Protocol\Type;

/**
 * Save registration options.
 *
 * @generated
 */
final class TextDocumentSaveRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    use SaveOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    final public function __construct(array|null $documentSelector, bool|null $includeText = null)
    {
            $this->documentSelector = $documentSelector;
    
            $this->includeText = $includeText;
    }
}