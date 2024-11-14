<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Matching options for the file operation pattern.
 *
 * @since 3.16.0
 *
 * @generated 2024-11-14
 */
final class FileOperationPatternOptions
{
    public function __construct(
        /**
         * The pattern should be matched ignoring casing.
         */
        public readonly ?bool $ignoreCase = null,
    ) {}
}
