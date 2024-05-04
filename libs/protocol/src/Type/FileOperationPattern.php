<?php

namespace Lsp\Protocol\Type;

/**
 * A pattern to describe in which file operation requests or notifications
 * the server is interested in receiving.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.16.0
 */
final class FileOperationPattern
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.16.0
     */
    final public function __construct(
        public readonly string $glob,
        public readonly FileOperationPatternKind $matches,
        public readonly FileOperationPatternOptions $options,
    ) {}
}
