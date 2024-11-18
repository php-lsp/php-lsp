<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node\Type;

use Lsp\Protocol\Generator\MetaModel\Node\MetaStructureLiteral;

/**
 * Represents a literal structure (e.g. `property: { start: uinteger; end: uinteger; }`).
 */
final class MetaStructureLiteralType extends MetaType
{
    public function __construct(
        public MetaStructureLiteral $value,
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
        return new self(MetaStructureLiteral::fromArray($data['value']));
    }
}
