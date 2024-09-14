<?php

namespace Lsp\Protocol\Type;

/**
 * The options to register for file operations.
 *
 * @generated
 *
 * @since 3.16.0
 */
final class FileOperationRegistrationOptions
{
    /**
     * @param list<FileOperationFilter> $filters
     */
    final public function __construct(
        public readonly array $filters,
    ) {}
}
