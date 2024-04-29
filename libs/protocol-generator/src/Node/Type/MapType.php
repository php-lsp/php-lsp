<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

/**
 * Represents a JSON object map
 * (e.g. `interface Map<K extends string | integer, V> { [key: K] => V; }`).
 */
final class MapType implements TypeInterface
{
    public function __construct(
        public readonly BaseType|ReferenceType $key,
        public readonly TypeInterface $value
    ) {}
}
