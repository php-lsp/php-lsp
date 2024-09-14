<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node\Type;

/**
 * Represents a string lite (e.g. `kind: 'rename'`).
 */
final class StringLiteralType extends Type
{
    public function __construct(
        public string $value,
    ) {
        parent::__construct();
    }

    public static function fromArray(array $data): self
    {
        // @phpstan-ignore-next-line
        return new self($data['value']);
    }
}
