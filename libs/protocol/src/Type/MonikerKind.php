<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The moniker kind.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-14
 */
enum MonikerKind: string
{
    /**
     * The moniker represent a symbol that is imported into a project.
     *
     * @var string
     */
    case Import = 'import';
    /**
     * The moniker represents a symbol that is exported from a project.
     *
     * @var string
     */
    case Export = 'export';
    /**
     * The moniker represents a symbol that is local to a project (e.g. a local
     * variable of a function, a class not visible outside the project, ...).
     *
     * @var string
     */
    case Local = 'local';
}
