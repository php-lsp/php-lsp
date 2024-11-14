<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Delete file options.
 *
 * @generated 2024-11-14
 */
final class DeleteFileOptions
{
    public function __construct(
        /**
         * Delete the content recursively if a folder is denoted.
         */
        public readonly ?bool $recursive = null,
        /**
         * Ignore the operation if the file doesn't exist.
         */
        public readonly ?bool $ignoreIfNotExists = null,
    ) {}
}
