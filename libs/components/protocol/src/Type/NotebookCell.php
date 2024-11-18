<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A notebook cell.
 *
 * A cell's document URI must be unique across ALL notebook cells and can
 * therefore be used to uniquely identify a notebook cell or the cell's text
 * document.
 *
 * @since 3.17.0
 */
final class NotebookCell
{
    public function __construct(
        /**
         * The cell's kind.
         */
        public readonly NotebookCellKind $kind,
        /**
         * The URI of the cell's text document content.
         *
         * @var non-empty-string
         */
        public readonly string $document,
        /**
         * Additional metadata stored with the cell.
         *
         * Note: should always be an object literal (e.g. LSPObject).
         *
         * @var list<string, mixed>|null
         */
        public readonly ?array $metadata = null,
        /**
         * Additional execution summary information if supported by the client.
         */
        public readonly ?ExecutionSummary $executionSummary = null,
    ) {}
}
