<?php

namespace Lsp\Protocol\Type;

/**
 * A change describing how to move a `NotebookCell`
 * array from state S to S'.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class NotebookCellArrayChange
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     * @param int<0, 2147483647> $start
     * @param int<0, 2147483647> $deleteCount
     * @param list<NotebookCell> $cells
     */
    final public function __construct(
        public readonly int $start,
        public readonly int $deleteCount,
        public readonly array $cells,
    ) {}
}
