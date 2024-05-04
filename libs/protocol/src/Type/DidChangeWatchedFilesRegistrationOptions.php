<?php

namespace Lsp\Protocol\Type;

/**
 * Describe options to be used when registered for text document change events.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class DidChangeWatchedFilesRegistrationOptions
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<FileSystemWatcher> $watchers
     */
    final public function __construct(
        public readonly array $watchers,
    ) {}
}
