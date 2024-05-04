<?php

namespace Lsp\Protocol\Type;

/**
 * Moniker uniqueness level to define scope of the moniker.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
enum UniquenessLevel: string
{
    /**
     * The moniker is only unique inside a document
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Document = 'document';

    /**
     * The moniker is unique inside a project for which a dump got created
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Project = 'project';

    /**
     * The moniker is unique inside the group to which a project belongs
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Group = 'group';

    /**
     * The moniker is unique inside the moniker scheme.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Scheme = 'scheme';

    /**
     * The moniker is globally unique
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Global = 'global';
}
