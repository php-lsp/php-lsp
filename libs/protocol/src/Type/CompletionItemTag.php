<?php

namespace Lsp\Protocol\Type;

/**
 * Completion item tags are extra annotations that tweak the rendering of a completion
 * item.
 *
 * @generated
 *
 * @since 3.15.0
 */
enum CompletionItemTag: int
{
    /**
     * Render a completion as obsolete, usually using a strike-out.
     *
     * @generated
     */
    case Deprecated = 1;
}
