<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node\Type;

/**
 * Represents a boolean literal type (e.g. `kind: true`).
 */
final class BooleanLiteralType extends Type
{
    public function __construct(
        public bool $value,
    ) {
        parent::__construct();
    }

    public static function fromArray(array $data): self
    {
        // @phpstan-ignore-next-line
        return new self($data['value']);
    }
}
