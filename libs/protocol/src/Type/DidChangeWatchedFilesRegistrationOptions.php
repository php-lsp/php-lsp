<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Describe options to be used when registered for text document change events.
 *
 * @generated 2024-09-21
 */
final class DidChangeWatchedFilesRegistrationOptions
{
    public function __construct(
        /**
         * The watchers to register.
         *
         * @var list<FileSystemWatcher>
         */
        public readonly array $watchers = [],
    ) {}
}
