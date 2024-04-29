<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

use Lsp\Protocol\Generator\Node\StructureLiteral;

/**
 * Represents a literal structure (e.g. `property: { start: uinteger; end: uinteger; }`).
 */
final class StructureLiteralType extends Type
{
    public function __construct(
        public StructureLiteral $value,
    ) {
        parent::__construct();
    }

    public function getSubNodeNames(): array
    {
        return ['value'];
    }

    public static function fromArray(array $data): self
    {
        // @phpstan-ignore-next-line
        return new self(StructureLiteral::fromArray($data['value']));
    }
}
