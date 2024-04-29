<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

/**
 * Represents a boolean literal type (e.g. `kind: true`).
 */
final class BooleanLiteralType implements TypeInterface
{
    public function __construct(
        public readonly bool $value,
    ) {}
}
