<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Support;

final class Name
{
    public static function isReserved(string $name): bool
    {
        return \in_array(\strtolower($name), [
            'namespace',
            'class',
            'enum',
            'interface',
            'function',
        ], true);
    }

    /**
     * @param array<array-key, string> $names
     */
    public static function containsReserved(array $names): bool
    {
        foreach ($names as $name) {
            if (self::isReserved($name)) {
                return true;
            }
        }

        return false;
    }
}
