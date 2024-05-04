<?php

namespace Lsp\Protocol\Type;

/**
 * General text document registration options.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class TextDocumentRegistrationOptions
{
    use TextDocumentRegistrationOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<object|NotebookCellTextDocumentFilter>|null $documentSelector
     */
    public function __construct(array|null $documentSelector)
    {
        $this->documentSelector = $documentSelector;
    }
}
