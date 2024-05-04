<?php

namespace Lsp\Protocol\Type;

/**
 * A set of predefined range kinds.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
enum FoldingRangeKind: string
{
    /**
     * Folding range for a comment
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Comment = 'comment';

    /**
     * Folding range for an import or include
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Imports = 'imports';

    /**
     * Folding range for a region (e.g. `#region`)
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Region = 'region';
}
