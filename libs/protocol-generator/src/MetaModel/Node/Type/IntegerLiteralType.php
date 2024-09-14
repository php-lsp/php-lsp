<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node\Type;

/**
 * Represents an integer literal type (e.g. `kind: 1`).
 */
final class IntegerLiteralType extends Type
{
    public function __construct(
        public int $value,
    ) {
        parent::__construct();
    }

    public static function fromArray(array $data): self
    {
        // @phpstan-ignore-next-line
        return new self($data['value']);
    }
}
