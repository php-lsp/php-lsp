<?php

namespace Lsp\Protocol\Type;

/**
 * The moniker kind.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
enum MonikerKind: string
{
    /**
     * The moniker represent a symbol that is imported into a project
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Import = 'import';

    /**
     * The moniker represents a symbol that is exported from a project
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Export = 'export';

    /**
     * The moniker represents a symbol that is local to a project (e.g. a local
     * variable of a function, a class not visible outside the project, ...)
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Local = 'local';
}
