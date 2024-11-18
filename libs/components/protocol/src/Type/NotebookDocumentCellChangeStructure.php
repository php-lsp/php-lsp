<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Structural changes to cells in a notebook document.
 *
 * @since 3.18.0
 */
final class NotebookDocumentCellChangeStructure
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
