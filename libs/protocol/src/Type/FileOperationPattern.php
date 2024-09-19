<?php

namespace Lsp\Protocol\Type;

/**
 * A pattern to describe in which file operation requests or notifications
 * the server is interested in receiving.
 *
 * @generated
 * @since 3.16.0
 */
final class FileOperationPattern
{
    final public function __construct(
        public readonly string $glob,
        public readonly FileOperationPatternKind|null $matches = null,
        public readonly FileOperationPatternOptions|null $options = null,
    ) {}
}