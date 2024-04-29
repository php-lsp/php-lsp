<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

use Lsp\Protocol\Generator\Node\StructureLiteral;

/**
 * Represents a literal structure (e.g. `property: { start: uinteger; end: uinteger; }`).
 */
final class StructureLiteralType implements TypeInterface
{
    public function __construct(
        public readonly StructureLiteral $value,
    ) {}
}
