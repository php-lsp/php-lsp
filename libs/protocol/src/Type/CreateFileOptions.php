<?php

namespace Lsp\Protocol\Type;

/**
 * Options to create a file.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class CreateFileOptions
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $overwrite,
        public readonly bool $ignoreIfExists,
    ) {}
}
