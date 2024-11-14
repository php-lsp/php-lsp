<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.18.0
 *
 * @generated 2024-11-14
 */
final class NotebookDocumentFilterWithCells
{
    public function __construct(
        /**
         * The notebook to be synced If a string value is provided it matches
         * against the notebook type. '*' matches every notebook.
         */
        public readonly string|NotebookDocumentFilterNotebookType|NotebookDocumentFilterScheme|NotebookDocumentFilterPattern|null $notebook = null,
        /**
         * The cells of the matching notebook to be synced.
         *
         * @var list<NotebookCellLanguage>
         */
        public readonly array $cells = [],
    ) {}
}
