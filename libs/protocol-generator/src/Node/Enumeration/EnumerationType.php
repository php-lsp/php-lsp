<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Enumeration;

enum EnumerationType
{
    case STRING;
    case INTEGER;
    case UINTEGER;

    /**
     * @param array{
     *     name: non-empty-string,
     *     kind: non-empty-string
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return match ($data['name']) {
            'string' => self::STRING,
            'integer' => self::INTEGER,
            'uinteger' => self::UINTEGER,
            default => throw new \LogicException('Unknown enumeration type'),
        };
    }
}
