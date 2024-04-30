<?php

namespace Lsp\Protocol;

/**
 * Symbol tags are extra annotations that tweak the rendering of a symbol.
 *
 * @since 3.16
 */
enum SymbolTag: int
{
    /**
     * Render a symbol as obsolete, usually using a strike-out.
     */
    case Deprecated = 1;
}
