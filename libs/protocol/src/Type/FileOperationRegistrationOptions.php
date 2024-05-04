<?php

namespace Lsp\Protocol\Type;

/**
 * The options to register for file operations.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class FileOperationRegistrationOptions
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     * @param list<FileOperationFilter> $filters
     */
    final public function __construct(
        public readonly array $filters,
    ) {}
}
