<?php

namespace Lsp\Protocol\Type;

/**
 * A filter to describe in which file operation requests or notifications
 * the server is interested in receiving.
 *
 * @generated
 * @since 3.16.0
 */
final class FileOperationFilter
{
    final public function __construct(
        public readonly string $scheme,
        public readonly FileOperationPattern $pattern,
    ) {}
}
