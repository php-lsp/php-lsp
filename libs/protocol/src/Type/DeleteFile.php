<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Delete file operation.
 *
 * @generated 2024-11-15
 */
final class DeleteFile
{
    public function __construct(
        /**
         * The resource operation kind.
         */
        public readonly string $kind,
        /**
         * The file to delete.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        /**
         * Delete options.
         */
        public readonly ?DeleteFileOptions $options = null,
        /**
         * An optional annotation identifier describing the operation.
         *
         * @since 3.16.0
         */
        public readonly ?string $annotationId = null,
    ) {}
}
