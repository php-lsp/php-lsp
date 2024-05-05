<?php

namespace Lsp\Protocol\Type;

/**
 * Symbol tags are extra annotations that tweak the rendering of a symbol.
 *
 * @generated
 * @since 3.16
 */
enum SymbolTag: int
{
    /**
     * Render a symbol as obsolete, usually using a strike-out.
     *
     * @generated
     */
    case Deprecated = 1;
}
