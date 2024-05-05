<?php

namespace Lsp\Protocol\Type;

/**
 * A notebook cell.
 *
 * A cell's document URI must be unique across ALL notebook
 * cells and can therefore be used to uniquely identify a
 * notebook cell or the cell's text document.
 *
 * @generated
 * @since 3.17.0
 */
final class NotebookCell
{
    /**
     * @generated
     * @since 3.17.0
     * @param non-empty-string $document
     * @param array<string, mixed> $metadata
     */
    final public function __construct(
        public readonly NotebookCellKind $kind,
        public readonly string $document,
        public readonly array $metadata,
        public readonly ExecutionSummary $executionSummary,
    ) {}
}
