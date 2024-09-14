<?php

namespace Lsp\Protocol\Type;

/**
 * General text document registration options.
 *
 * @generated
 */
class TextDocumentRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    /**
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    public function __construct(?array $documentSelector)
    {
        $this->documentSelector = $documentSelector;
    }
}
