<?php

namespace Lsp\Protocol\Type;

/**
 * Options specific to a notebook plus its cells
 * to be synced to the server.
 *
 * If a selector provides a notebook document
 * filter but no cell selector all cells of a
 * matching notebook document will be synced.
 *
 * If a selector provides no notebook document
 * filter but only a cell selector all notebook
 * document that contain at least one matching
 * cell will be synced.
 *
 * @generated
 * @since 3.17.0
 */
class NotebookDocumentSyncOptions
{
    use NotebookDocumentSyncOptionsMixin;

    /**
     * @param list<NotebookDocumentSyncOptionsNotebookSelector> $notebookSelector
     */
    public function __construct(array $notebookSelector, bool $save)
    {
        $this->notebookSelector = $notebookSelector;

        $this->save = $save;
    }
}
