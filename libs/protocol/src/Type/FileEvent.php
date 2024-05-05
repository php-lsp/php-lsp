<?php

namespace Lsp\Protocol\Type;

/**
 * An event describing a file change.
 *
 * @generated
 */
final class FileEvent
{
    /**
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly string $uri,
        public readonly FileChangeType $type,
    ) {}
}