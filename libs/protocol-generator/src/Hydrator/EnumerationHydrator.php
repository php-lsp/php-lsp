<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Hydrator;

use Lsp\Protocol\Generator\Hydrator\Enumeration\EnumerationEntryHydrator;
use Lsp\Protocol\Generator\Hydrator\Enumeration\EnumerationTypeHydrator;
use Lsp\Protocol\Generator\Node\Enumeration;

/**
 * @template-extends Hydrator<Enumeration, array<array-key, mixed>>
 */
final class EnumerationHydrator extends Hydrator
{
    private readonly EnumerationTypeHydrator $enumerationTypeHydrator;
    private readonly EnumerationEntryHydrator $enumerationEntryHydrator;

    public function __construct()
    {
        $this->enumerationTypeHydrator = new EnumerationTypeHydrator();
        $this->enumerationEntryHydrator = new EnumerationEntryHydrator();
    }

    public function hydrate(array $data): Enumeration
    {
        return new Enumeration(
            // @phpstan-ignore-next-line
            name: $data['name'],
            // @phpstan-ignore-next-line
            type: $this->enumerationTypeHydrator->hydrate($data['type']),
            // @phpstan-ignore-next-line
            values: $this->enumerationEntryHydrator->hydrateAll($data['values'] ?? []),
            // @phpstan-ignore-next-line
            supportsCustomValues: $data['supportsCustomValues'] ?? null,
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
