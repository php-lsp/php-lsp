<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

/**
 * Represents a reference to another type (e.g. `TextDocument`). This is either
 * a `Structure`, a `Enumeration` or a `TypeAlias` in the same meta model.
 */
final class ReferenceType extends Type implements KeyTypeInterface
{
    /**
     * @param non-empty-string $name
     */
    public function __construct(
        public string $name,
    ) {
        parent::__construct();
    }

    public static function fromArray(array $data): self
    {
        // @phpstan-ignore-next-line
        return new self($data['name']);
    }
}
