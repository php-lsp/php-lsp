<?php

namespace Lsp\Protocol\Type;

/**
 * Symbol tags are extra annotations that tweak the rendering of a symbol.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16
 */
enum SymbolTag: int
{
    /**
     * Render a symbol as obsolete, usually using a strike-out.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Deprecated = 1;
}
