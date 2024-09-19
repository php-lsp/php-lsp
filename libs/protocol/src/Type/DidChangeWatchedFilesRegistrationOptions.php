<?php

namespace Lsp\Protocol\Type;

/**
 * Describe options to be used when registered for text document change events.
 *
 * @generated
 */
final class DidChangeWatchedFilesRegistrationOptions
{
    /**
     * @param list<FileSystemWatcher> $watchers
     */
    final public function __construct(
        public readonly array $watchers,
    ) {}
}