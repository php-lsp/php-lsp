<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 */
enum ResourceOperationKind: string
{
    /**
     * Supports creating new files and folders.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Create = 'create';

    /**
     * Supports renaming existing files and folders.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Rename = 'rename';

    /**
     * Supports deleting existing files and folders.
     *
     * @generated 2024-05-04T17:58:12+00:00
     */
    case Delete = 'delete';
}
