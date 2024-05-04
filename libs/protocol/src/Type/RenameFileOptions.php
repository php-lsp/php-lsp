<?php

namespace Lsp\Protocol\Type;

/**
 * Rename file options
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class RenameFileOptions
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $overwrite,
        public readonly bool $ignoreIfExists,
    ) {}
}
