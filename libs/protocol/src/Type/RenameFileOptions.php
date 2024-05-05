<?php

namespace Lsp\Protocol\Type;

/**
 * Rename file options
 *
 * @generated
 */
final class RenameFileOptions
{
    final public function __construct(
        public readonly bool $overwrite,
        public readonly bool $ignoreIfExists,
    ) {}
}