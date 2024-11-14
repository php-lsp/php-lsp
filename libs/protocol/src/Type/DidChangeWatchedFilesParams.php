<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The watched files change notification's parameters.
 *
 * @generated 2024-11-14
 */
final class DidChangeWatchedFilesParams
{
    public function __construct(
        /**
         * The actual file events.
         *
         * @var list<FileEvent>
         */
        public readonly array $changes = [],
    ) {}
}
