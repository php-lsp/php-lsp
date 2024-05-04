<?php

namespace Lsp\Protocol\Type;

/**
 * The watched files change notification's parameters.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DidChangeWatchedFilesParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<FileEvent> $changes
     */
    final public function __construct(
        public readonly array $changes,
    ) {}
}
