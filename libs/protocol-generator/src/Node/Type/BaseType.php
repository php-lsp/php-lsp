<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

/**
 * Represents a base type like `string` or `DocumentUri`.
 */
enum BaseType: string implements KeyTypeInterface
{
    case URI = 'URI';
    case DOCUMENT_URI = 'DocumentUri';
    case INTEGER = 'integer';
    case UINTEGER = 'uinteger';
    case DECIMAL = 'decimal';
    case REGEXP = 'RegExp';
    case STRING = 'string';
    case BOOLEAN = 'boolean';
    case NULL = 'null';

    /**
     * @param array<array-key, mixed> $data
     */
    public static function fromArray(array $data): self
    {
        // @phpstan-ignore-next-line
        return self::tryFrom($data['name'])
            ?? throw new \LogicException('Unknown base type');
    }
}
