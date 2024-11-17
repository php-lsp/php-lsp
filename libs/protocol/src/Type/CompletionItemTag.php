<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Completion item tags are extra annotations that tweak the rendering of a
 * completion item.
 *
 * @since 3.15.0
 */
enum CompletionItemTag: int
{
    /**
     * Render a completion as obsolete, usually using a strike-out.
     *
     * @var int<0, 2147483647>
     */
    case Deprecated = 1;
}
