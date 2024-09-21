<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents information on a file/folder rename.
 *
 * @since 3.16.0
 *
 * @generated 2024-09-21
 */
final class FileRename
{
    public function __construct(
        /**
         * A file:// URI for the original location of the file/folder being
         * renamed.
         */
        public readonly string $oldUri,
        /**
         * A file:// URI for the new location of the file/folder being renamed.
         */
        public readonly string $newUri,
    ) {}
}
