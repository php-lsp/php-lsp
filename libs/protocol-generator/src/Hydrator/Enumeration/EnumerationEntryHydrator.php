<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Hydrator\Enumeration;

use Lsp\Protocol\Generator\Hydrator\Hydrator;
use Lsp\Protocol\Generator\Node\Enumeration\EnumerationEntry;

/**
 * @template-extends Hydrator<EnumerationEntry, array<array-key, mixed>>
 */
final class EnumerationEntryHydrator extends Hydrator
{
    public function hydrate(array $data): EnumerationEntry
    {
        return new EnumerationEntry(
            // @phpstan-ignore-next-line
            name: $data['name'],
            // @phpstan-ignore-next-line
            value: $data['value'],
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
