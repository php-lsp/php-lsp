<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A change describing how to move a `NotebookCell` array from state S to S'.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class NotebookCellArrayChange
{
    public function __construct(
        /**
         * The start oftest of the cell that changed.
         *
         * @var int<0, 2147483647>
         */
        public readonly int $start,
        /**
         * The deleted cells.
         *
         * @var int<0, 2147483647>
         */
        public readonly int $deleteCount,
        /**
         * The new cells, if any.
         *
         * @var list<NotebookCell>|null
         */
        public readonly ?array $cells = null,
    ) {}
}
