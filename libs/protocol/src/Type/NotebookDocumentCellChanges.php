<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Cell changes to a notebook document.
 *
 * @since 3.18.0
 *
 * @generated 2024-11-15
 */
final class NotebookDocumentCellChanges
{
    public function __construct(
        /**
         * Changes to the cell structure to add or remove cells.
         */
        public readonly ?NotebookDocumentCellChangeStructure $structure = null,
        /**
         * Changes to notebook cells properties like its kind, execution summary
         * or metadata.
         *
         * @var list<NotebookCell>|null
         */
        public readonly ?array $data = null,
        /**
         * Changes to the text content of notebook cells.
         *
         * @var list<NotebookDocumentCellContentChanges>|null
         */
        public readonly ?array $textContent = null,
    ) {}
}
