<?php

namespace Lsp\Protocol\Type;

/**
 * Delete file options
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DeleteFileOptions
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $recursive,
        public readonly bool $ignoreIfNotExists,
    ) {}
}
