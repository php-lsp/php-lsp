<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The options to register for file operations.
 *
 * @since 3.16.0
 */
final class FileOperationRegistrationOptions
{
    public function __construct(
        /**
         * The actual filters.
         *
         * @var list<FileOperationFilter>
         */
        public readonly array $filters = [],
    ) {}
}
