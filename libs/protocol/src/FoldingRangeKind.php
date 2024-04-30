<?php

namespace Lsp\Protocol;

/**
 * A set of predefined range kinds.
 */
enum FoldingRangeKind: string
{
    /**
     * Folding range for a comment
     */
    case Comment = 'comment';

    /**
     * Folding range for an import or include
     */
    case Imports = 'imports';

    /**
     * Folding range for a region (e.g. `#region`)
     */
    case Region = 'region';
}
