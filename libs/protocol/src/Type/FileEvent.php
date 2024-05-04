<?php

namespace Lsp\Protocol\Type;

/**
 * An event describing a file change.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class FileEvent
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly string $uri,
        public readonly FileChangeType $type,
    ) {}
}
