<?php

namespace Lsp\Protocol\Type;

/**
 * Delete file options
 *
 * @generated
 */
final class DeleteFileOptions
{
    final public function __construct(
        public readonly bool|null $recursive = null,
        public readonly bool|null $ignoreIfNotExists = null,
    ) {}
}