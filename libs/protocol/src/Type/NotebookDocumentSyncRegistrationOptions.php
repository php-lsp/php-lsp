<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options specific to a notebook.
 *
 * @generated
 * @since 3.17.0
 */
final class NotebookDocumentSyncRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use NotebookDocumentSyncOptionsMixin;

    /**
     * @param list<NotebookDocumentSyncOptionsNotebookSelector> $notebookSelector
     */
    final public function __construct(array $notebookSelector, bool|null $save = null, string|null $id = null)
    {
            $this->notebookSelector = $notebookSelector;
    
            $this->save = $save;
    
            $this->id = $id;
    }
}