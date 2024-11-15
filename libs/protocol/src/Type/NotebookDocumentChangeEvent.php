<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A change event for a notebook document.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-15
 */
final class NotebookDocumentChangeEvent
{
    public function __construct(
        /**
         * The changed meta data if any.
         *
         * Note: should always be an object literal (e.g. LSPObject).
         *
         * @var list<string, mixed>|null
         */
        public readonly ?array $metadata = null,
        /**
         * Changes to cells.
         */
        public readonly ?NotebookDocumentCellChanges $cells = null,
    ) {}
}
