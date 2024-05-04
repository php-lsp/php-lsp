<?php

namespace Lsp\Protocol\Type;

trait NotebookDocumentSyncOptionsMixin
{
    /**
     * The notebooks to be synced
     *
     * @generated 2024-05-04T17:58:12+00:00
     * @var list<object>
     */
    public readonly array $notebookSelector;

    /**
     * Whether save notification should be forwarded to
     * the server. Will only be honored if mode === `notebook`.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    public readonly bool $save;
}
