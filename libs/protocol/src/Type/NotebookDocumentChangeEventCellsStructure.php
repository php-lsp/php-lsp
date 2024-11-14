<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
final class NotebookDocumentChangeEventCellsStructure
{
    public function __construct(
        /**
         * The change to the cell array.
         */
        public readonly NotebookCellArrayChange $array,
        /**
         * Additional opened cell text documents.
         *
         * @var list<TextDocumentItem>|null
         */
        public readonly ?array $didOpen = null,
        /**
         * Additional closed cell text documents.
         *
         * @var list<TextDocumentIdentifier>|null
         */
        public readonly ?array $didClose = null,
    ) {}
}
