<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A set of predefined range kinds.
 */
enum FoldingRangeKind: string
{
    /**
     * Folding range for a comment.
     *
     * @var string
     */
    case Comment = 'comment';
    /**
     * Folding range for an import or include.
     *
     * @var string
     */
    case Imports = 'imports';
    /**
     * Folding range for a region (e.g. `#region`).
     *
     * @var string
     */
    case Region = 'region';
}
