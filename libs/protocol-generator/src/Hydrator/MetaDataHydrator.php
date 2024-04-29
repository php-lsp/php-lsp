<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Hydrator;

use Lsp\Protocol\Generator\Node\MetaData;

/**
 * @template-extends Hydrator<MetaData, array<array-key, mixed>>
 */
final class MetaDataHydrator extends Hydrator
{
    public function hydrate(array $data): MetaData
    {
        return new MetaData(
            // @phpstan-ignore-next-line
            version: $data['version'],
        );
    }
}
