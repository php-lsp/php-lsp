<?php

namespace Lsp\Protocol\Type;

/**
 * A notebook cell kind.
 *
 * @generated
 * @since 3.17.0
 */
enum NotebookCellKind: int
{
    /**
     * A markup-cell is formatted source that is used for display.
     *
     * @generated
     */
    case Markup = 1;

    /**
     * A code-cell is source code.
     *
     * @generated
     */
    case Code = 2;
}