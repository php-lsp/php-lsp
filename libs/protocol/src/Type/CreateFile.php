<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Create file operation.
 */
final class CreateFile
{
    public function __construct(
        /**
         * The resource operation kind.
         */
        public readonly string $kind,
        /**
         * The resource to create.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        /**
         * Additional options.
         */
        public readonly ?CreateFileOptions $options = null,
        /**
         * An optional annotation identifier describing the operation.
         *
         * @since 3.16.0
         */
        public readonly ?string $annotationId = null,
    ) {}
}
