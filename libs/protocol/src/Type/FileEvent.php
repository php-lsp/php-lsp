<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * An event describing a file change.
 */
final class FileEvent
{
    public function __construct(
        /**
         * The file's uri.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        /**
         * The change type.
         */
        public readonly FileChangeType $type,
    ) {}
}
