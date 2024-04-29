<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Hydrator\Enumeration;

use Lsp\Protocol\Generator\Hydrator\Hydrator;
use Lsp\Protocol\Generator\Node\Enumeration\EnumerationType;

/**
 * @template-extends Hydrator<EnumerationType, array<array-key, mixed>>
 */
final class EnumerationTypeHydrator extends Hydrator
{
    public function hydrate(array $data): EnumerationType
    {
        return match ($data['name'] ?? 'string') {
            'string' => EnumerationType::STRING,
            'integer' => EnumerationType::INTEGER,
            'uinteger' => EnumerationType::UINTEGER,
            default => throw new \LogicException('Unknown enumeration type'),
        };
    }
}
