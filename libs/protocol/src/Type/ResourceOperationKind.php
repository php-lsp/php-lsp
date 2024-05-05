<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
enum ResourceOperationKind: string
{
    /**
     * Supports creating new files and folders.
     *
     * @generated
     */
    case Create = 'create';

    /**
     * Supports renaming existing files and folders.
     *
     * @generated
     */
    case Rename = 'rename';

    /**
     * Supports deleting existing files and folders.
     *
     * @generated
     */
    case Delete = 'delete';
}