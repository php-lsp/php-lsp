<?php

namespace Lsp\Protocol\Type;

/**
 * A document highlight kind.
 *
 * @generated
 */
enum DocumentHighlightKind: int
{
    /**
     * A textual occurrence.
     *
     * @generated
     */
    case Text = 1;

    /**
     * Read-access of a symbol, like reading a variable.
     *
     * @generated
     */
    case Read = 2;

    /**
     * Write-access of a symbol, like writing to a variable.
     *
     * @generated
     */
    case Write = 3;
}