<?php

namespace Lsp\Protocol\Type;

/**
 * A notebook cell kind.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
enum NotebookCellKind: int
{
    /**
     * A markup-cell is formatted source that is used for display.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Markup = 1;

    /**
     * A code-cell is source code.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Code = 2;
}
