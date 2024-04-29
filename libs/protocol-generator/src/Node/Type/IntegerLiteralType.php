<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

/**
 * Represents an integer literal type (e.g. `kind: 1`).
 */
final class IntegerLiteralType implements TypeInterface
{
    public function __construct(
        public readonly int $value,
    ) {}
}
