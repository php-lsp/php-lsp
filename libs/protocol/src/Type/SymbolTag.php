<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Symbol tags are extra annotations that tweak the rendering of a symbol.
 *
 * @since 3.16
 */
enum SymbolTag: int
{
    /**
     * Render a symbol as obsolete, usually using a strike-out.
     *
     * @var int<0, 2147483647>
     */
    case Deprecated = 1;
}
