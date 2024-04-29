<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Hydrator;

use Lsp\Protocol\Generator\Node\Structure;

/**
 * @template-extends Hydrator<Structure, array<array-key, mixed>>
 */
final class StructureHydrator extends Hydrator
{
    public function __construct(
        public readonly TypeHydrator $types,
    ) {}

    public function hydrate(array $data): Structure
    {
        return new Structure(
            // @phpstan-ignore-next-line
            name: $data['name'],
            // @phpstan-ignore-next-line
            extends: $this->types->hydrateAllOrNull($data['extends'] ?? null),
            // @phpstan-ignore-next-line
            mixins: $this->types->hydrateAllOrNull($data['mixins'] ?? null),
            // @phpstan-ignore-next-line
            properties: $this->types->structures->properties->hydrateAll($data['properties'] ?? []),
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
