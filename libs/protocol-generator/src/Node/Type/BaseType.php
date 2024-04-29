<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

/**
 * Represents a base type like `string` or `DocumentUri`.
 */
enum BaseType: string implements TypeInterface
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
}
