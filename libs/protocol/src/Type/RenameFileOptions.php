<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Rename file options.
 *
 * @generated 2024-11-15
 */
final class RenameFileOptions
{
    public function __construct(
        /**
         * Overwrite target if existing. Overwrite wins over `ignoreIfExists`.
         */
        public readonly ?bool $overwrite = null,
        /**
         * Ignores if target exists.
         */
        public readonly ?bool $ignoreIfExists = null,
    ) {}
}
