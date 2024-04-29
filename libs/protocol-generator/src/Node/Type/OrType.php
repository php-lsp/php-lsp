<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

/**
 * Represents an `or` type (e.g. `Location | LocationLink`).
 */
final class OrType implements TypeInterface
{
    /**
     * @param list<TypeInterface> $items
     */
    public function __construct(
        public readonly array $items,
    ) {}
}
