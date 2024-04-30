<?php

namespace Lsp\Protocol;

/**
 * The moniker kind.
 *
 * @since 3.16.0
 */
enum MonikerKind: string
{
    /**
     * The moniker represent a symbol that is imported into a project
     */
    case Import = 'import';

    /**
     * The moniker represents a symbol that is exported from a project
     */
    case Export = 'export';

    /**
     * The moniker represents a symbol that is local to a project (e.g. a local
     * variable of a function, a class not visible outside the project, ...)
     */
    case Local = 'local';
}
