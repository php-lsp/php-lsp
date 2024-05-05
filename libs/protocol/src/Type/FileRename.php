<?php

namespace Lsp\Protocol\Type;

/**
 * Represents information on a file/folder rename.
 *
 * @generated
 * @since 3.16.0
 */
final class FileRename
{
    final public function __construct(
        public readonly string $oldUri,
        public readonly string $newUri,
    ) {}
}