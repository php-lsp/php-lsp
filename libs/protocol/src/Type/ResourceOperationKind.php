<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-11-14
 */
enum ResourceOperationKind: string
{
    /**
     * Supports creating new files and folders.
     *
     * @var string
     */
    case Create = 'create';
    /**
     * Supports renaming existing files and folders.
     *
     * @var string
     */
    case Rename = 'rename';
    /**
     * Supports deleting existing files and folders.
     *
     * @var string
     */
    case Delete = 'delete';
}
