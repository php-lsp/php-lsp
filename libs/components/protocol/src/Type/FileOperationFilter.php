<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A filter to describe in which file operation requests or notifications the
 * server is interested in receiving.
 *
 * @since 3.16.0
 */
final class FileOperationFilter
{
    public function __construct(
        /**
         * The actual file operation pattern.
         */
        public readonly FileOperationPattern $pattern,
        /**
         * A Uri scheme like `file` or `untitled`.
         */
        public readonly ?string $scheme = null,
    ) {}
}
