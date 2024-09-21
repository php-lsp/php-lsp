<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class NotebookDocumentSyncOptionsNotebookSelector
{
    public function __construct(
        /**
         * The notebook to be synced If a string value is provided it matches
         * against the notebook type. '*' matches every notebook.
         */
        public readonly string|NotebookCellTextDocumentFilterNotebook|null $notebook = null,
        /**
         * The cells of the matching notebook to be synced.
         *
         * @var list<NotebookDocumentSyncOptionsNotebookSelectorCells>
         */
        public readonly array $cells = [],
    ) {}
}
