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
        public readonly bool $recursive,
        public readonly bool $ignoreIfNotExists,
    ) {}
}
