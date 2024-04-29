<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

/**
 * Represents a string lite (e.g. `kind: 'rename'`).
 */
final class StringLiteralType implements TypeInterface
{
    public function __construct(
        public readonly string $value,
    ) {}
}
