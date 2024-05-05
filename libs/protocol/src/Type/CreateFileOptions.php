<?php

namespace Lsp\Protocol\Type;

/**
 * Options to create a file.
 *
 * @generated
 */
final class CreateFileOptions
{
    final public function __construct(
        public readonly bool $overwrite,
        public readonly bool $ignoreIfExists,
    ) {}
}