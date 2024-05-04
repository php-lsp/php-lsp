<?php

namespace Lsp\Protocol\Type;

/**
 * Represents information on a file/folder rename.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class FileRename
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     */
    final public function __construct(
        public readonly string $oldUri,
        public readonly string $newUri,
    ) {}
}
