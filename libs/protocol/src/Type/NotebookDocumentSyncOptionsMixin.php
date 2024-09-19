<?php

namespace Lsp\Protocol\Type;

trait NotebookDocumentSyncOptionsMixin
{
    /**
     * The notebooks to be synced
     *
     * @generated
     * @var list<NotebookDocumentSyncOptionsNotebookSelector>
     */
    public readonly array $notebookSelector;

    /**
     * Whether save notification should be forwarded to
     * the server. Will only be honored if mode === `notebook`.
     *
     * @generated
     */
    public bool|null $save = null;
}