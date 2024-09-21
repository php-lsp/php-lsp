<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A document highlight kind.
 *
 * @generated 2024-09-21
 */
enum DocumentHighlightKind: int
{
    /**
     * A textual occurrence.
     *
     * @var int<0, 2147483647>
     */
    case Text = 1;
    /**
     * Read-access of a symbol, like reading a variable.
     *
     * @var int<0, 2147483647>
     */
    case Read = 2;
    /**
     * Write-access of a symbol, like writing to a variable.
     *
     * @var int<0, 2147483647>
     */
    case Write = 3;
}
