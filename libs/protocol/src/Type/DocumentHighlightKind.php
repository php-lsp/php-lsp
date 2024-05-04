<?php

namespace Lsp\Protocol\Type;

/**
 * A document highlight kind.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
enum DocumentHighlightKind: int
{
    /**
     * A textual occurrence.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Text = 1;

    /**
     * Read-access of a symbol, like reading a variable.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Read = 2;

    /**
     * Write-access of a symbol, like writing to a variable.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Write = 3;
}
