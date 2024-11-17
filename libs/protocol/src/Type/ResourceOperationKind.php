<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

enum ResourceOperationKind: string
{
    /**
     * Supports creating new files and folders.
     */
    case Create = 'create';
    /**
     * Supports renaming existing files and folders.
     */
    case Rename = 'rename';
    /**
     * Supports deleting existing files and folders.
     */
    case Delete = 'delete';
}
