<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Hydrator;

use Lsp\Protocol\Generator\Node\StructureLiteral;

/**
 * @template-extends Hydrator<StructureLiteral, array<array-key, mixed>>
 */
final class StructureLiteralHydrator extends Hydrator
{
    public function __construct(
        public readonly PropertyHydrator $properties,
    ) {}

    public function hydrate(array $data): StructureLiteral
    {
        return new StructureLiteral(
            // @phpstan-ignore-next-line
            properties: $this->properties->hydrateAll($data['properties'] ?? []),
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
