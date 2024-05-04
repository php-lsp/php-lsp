<?php

namespace Lsp\Protocol\Type;

/**
 * Value-object that contains additional information when
 * requesting references.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class ReferenceContext
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $includeDeclaration,
    ) {}
}
