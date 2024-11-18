<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Value-object that contains additional information when requesting references.
 */
final class ReferenceContext
{
    public function __construct(
        /**
         * Include the declaration of the current symbol.
         */
        public readonly bool $includeDeclaration,
    ) {}
}
