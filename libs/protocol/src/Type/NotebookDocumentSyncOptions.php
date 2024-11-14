<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Options specific to a notebook plus its cells to be synced to the server.
 *
 * If a selector provides a notebook document filter but no cell selector all
 * cells of a matching notebook document will be synced.
 *
 * If a selector provides no notebook document filter but only a cell selector
 * all notebook document that contain at least one matching cell will be synced.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class NotebookDocumentSyncOptions
{
    use NotebookDocumentSyncOptionsMixin;

    /**
     * @param list<NotebookDocumentFilterWithNotebook|NotebookDocumentFilterWithCells> $notebookSelector
     *        The notebooks to be synced
     * @param bool|null $save Whether save notification should be forwarded to
     *        the server. Will only be honored if mode === `notebook`.
     */
    public function __construct(array $notebookSelector = [], ?bool $save = null)
    {
        $this->notebookSelector = $notebookSelector;
        $this->save = $save;
    }
}
