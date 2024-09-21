<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-09-21
 */
final class NotebookDocumentChangeEventCells
{
    public function __construct(
        /**
         * Changes to the cell structure to add or remove cells.
         *
         * @var object{
         *          array: NotebookCellArrayChange,
         *          didOpen: list<TextDocumentItem>,
         *          didClose: list<TextDocumentIdentifier>
         *      }|null
         */
        public readonly ?object $structure = null,
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
         * @var list<object{
         *          document: VersionedTextDocumentIdentifier,
         *          changes: list<object{    text: string}>
         *      }>|null
         */
        public readonly ?array $textContent = null,
    ) {}
}
