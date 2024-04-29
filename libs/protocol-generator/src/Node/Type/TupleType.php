<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

/**
 * Represents a `tuple` type (e.g. `[integer, integer]`).
 */
final class TupleType implements TypeInterface
{
    /**
     * @param list<TypeInterface> $items
     */
    public function __construct(
        public readonly array $items,
    ) {}
}
