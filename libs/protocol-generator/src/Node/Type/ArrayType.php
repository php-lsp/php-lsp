<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

/**
 * Represents an array type (e.g. `TextDocument[]`).
 */
final class ArrayType implements TypeInterface
{
    public function __construct(
        public readonly TypeInterface $element,
    ) {}
}
