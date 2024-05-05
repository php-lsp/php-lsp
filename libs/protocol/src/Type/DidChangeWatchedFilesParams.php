<?php

namespace Lsp\Protocol\Type;

/**
 * The watched files change notification's parameters.
 *
 * @generated
 */
final class DidChangeWatchedFilesParams
{
    /**
     * @param list<FileEvent> $changes
     */
    final public function __construct(
        public readonly array $changes,
    ) {}
}