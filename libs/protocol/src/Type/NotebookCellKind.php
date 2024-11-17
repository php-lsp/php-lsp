<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A notebook cell kind.
 *
 * @since 3.17.0
 */
enum NotebookCellKind: int
{
    /**
     * A markup-cell is formatted source that is used for display.
     *
     * @var int<0, 2147483647>
     */
    case Markup = 1;
    /**
     * A code-cell is source code.
     *
     * @var int<0, 2147483647>
     */
    case Code = 2;
}
