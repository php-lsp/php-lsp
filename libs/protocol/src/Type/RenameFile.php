<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Rename file operation.
 */
final class RenameFile
{
    public function __construct(
        /**
         * The resource operation kind.
         */
        public readonly string $kind,
        /**
         * The old (existing) location.
         *
         * @var non-empty-string
         */
        public readonly string $oldUri,
        /**
         * The new location.
         *
         * @var non-empty-string
         */
        public readonly string $newUri,
        /**
         * Rename options.
         */
        public readonly ?RenameFileOptions $options = null,
        /**
         * An optional annotation identifier describing the operation.
         *
         * @since 3.16.0
         */
        public readonly ?string $annotationId = null,
    ) {}
}
