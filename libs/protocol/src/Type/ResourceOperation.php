<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A generic resource operation.
 */
final class ResourceOperation
{
    public function __construct(
        /**
         * The resource operation kind.
         */
        public readonly string $kind,
        /**
         * An optional annotation identifier describing the operation.
         *
         * @since 3.16.0
         */
        public readonly ?string $annotationId = null,
    ) {}
}
