<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Hydrator;

use Lsp\Protocol\Generator\Node\TypeAlias;

/**
 * @template-extends Hydrator<TypeAlias, array<array-key, mixed>>
 */
final class TypeAliasHydrator extends Hydrator
{
    public function __construct(
        public readonly TypeHydrator $types,
    ) {}

    public function hydrate(array $data): TypeAlias
    {
        return new TypeAlias(
            // @phpstan-ignore-next-line
            name: $data['name'],
            // @phpstan-ignore-next-line
            type: $this->types->hydrate($data['type']),
            // @phpstan-ignore-next-line
            documentation: $data['documentation'] ?? null,
            // @phpstan-ignore-next-line
            since: $data['since'] ?? null,
            // @phpstan-ignore-next-line
            proposed: $data['proposed'] ?? null,
            // @phpstan-ignore-next-line
            deprecated: $data['deprecated'] ?? null,
        );
    }
}
