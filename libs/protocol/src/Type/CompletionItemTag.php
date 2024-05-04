<?php

namespace Lsp\Protocol\Type;

/**
 * Completion item tags are extra annotations that tweak the rendering of a completion
 * item.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.15.0
 */
enum CompletionItemTag: int
{
    /**
     * Render a completion as obsolete, usually using a strike-out.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Deprecated = 1;
}
