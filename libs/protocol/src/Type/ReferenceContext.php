<?php

namespace Lsp\Protocol\Type;

/**
 * Value-object that contains additional information when
 * requesting references.
 *
 * @generated
 */
final class ReferenceContext
{
    final public function __construct(
        public readonly bool $includeDeclaration,
    ) {}
}