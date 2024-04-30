<?php

namespace Lsp\Protocol;

/**
 * Completion item tags are extra annotations that tweak the rendering of a completion
 * item.
 *
 * @since 3.15.0
 */
enum CompletionItemTag: int
{
    /**
     * Render a completion as obsolete, usually using a strike-out.
     */
    case Deprecated = 1;
}
