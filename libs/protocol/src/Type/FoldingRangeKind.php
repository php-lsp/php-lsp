<?php

namespace Lsp\Protocol\Type;

/**
 * A set of predefined range kinds.
 *
 * @generated
 */
enum FoldingRangeKind: string
{
    /**
     * Folding range for a comment
     *
     * @generated
     */
    case Comment = 'comment';

    /**
     * Folding range for an import or include
     *
     * @generated
     */
    case Imports = 'imports';

    /**
     * Folding range for a region (e.g. `#region`)
     *
     * @generated
     */
    case Region = 'region';
}
