<?php

namespace Lsp\Protocol;

/**
 * A document highlight kind.
 */
enum DocumentHighlightKind: int
{
    /**
     * A textual occurrence.
     */
    case Text = 1;

    /**
     * Read-access of a symbol, like reading a variable.
     */
    case Read = 2;

    /**
     * Write-access of a symbol, like writing to a variable.
     */
    case Write = 3;
}
