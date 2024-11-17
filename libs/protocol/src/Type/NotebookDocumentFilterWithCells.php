<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 */
final class NotebookDocumentFilterWithCells
{
    public function __construct(
        /**
         * The notebook to be synced If a string value is provided it matches
         * against the notebook type. '*' matches every notebook.
         */
        public readonly NotebookDocumentFilterNotebookType|NotebookDocumentFilterScheme|NotebookDocumentFilterPattern|string|null $notebook = null,
        /**
         * The cells of the matching notebook to be synced.
         *
         * @var list<NotebookCellLanguage>
         */
        public readonly array $cells = [],
    ) {}
}
