<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Moniker uniqueness level to define scope of the moniker.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-14
 */
enum UniquenessLevel: string
{
    /**
     * The moniker is only unique inside a document.
     *
     * @var string
     */
    case Document = 'document';
    /**
     * The moniker is unique inside a project for which a dump got created.
     *
     * @var string
     */
    case Project = 'project';
    /**
     * The moniker is unique inside the group to which a project belongs.
     *
     * @var string
     */
    case Group = 'group';
    /**
     * The moniker is unique inside the moniker scheme.
     *
     * @var string
     */
    case Scheme = 'scheme';
    /**
     * The moniker is globally unique.
     *
     * @var string
     */
    case Global = 'global';
}
