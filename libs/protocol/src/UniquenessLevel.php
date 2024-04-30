<?php

namespace Lsp\Protocol;

/**
 * Moniker uniqueness level to define scope of the moniker.
 *
 * @since 3.16.0
 */
enum UniquenessLevel: string
{
    /**
     * The moniker is only unique inside a document
     */
    case Document = 'document';

    /**
     * The moniker is unique inside a project for which a dump got created
     */
    case Project = 'project';

    /**
     * The moniker is unique inside the group to which a project belongs
     */
    case Group = 'group';

    /**
     * The moniker is unique inside the moniker scheme.
     */
    case Scheme = 'scheme';

    /**
     * The moniker is globally unique
     */
    case Global = 'global';
}
