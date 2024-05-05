<?php

namespace Lsp\Protocol\Type;

/**
 * Moniker uniqueness level to define scope of the moniker.
 *
 * @generated
 * @since 3.16.0
 */
enum UniquenessLevel: string
{
    /**
     * The moniker is only unique inside a document
     *
     * @generated
     */
    case Document = 'document';

    /**
     * The moniker is unique inside a project for which a dump got created
     *
     * @generated
     */
    case Project = 'project';

    /**
     * The moniker is unique inside the group to which a project belongs
     *
     * @generated
     */
    case Group = 'group';

    /**
     * The moniker is unique inside the moniker scheme.
     *
     * @generated
     */
    case Scheme = 'scheme';

    /**
     * The moniker is globally unique
     *
     * @generated
     */
    case Global = 'global';
}
