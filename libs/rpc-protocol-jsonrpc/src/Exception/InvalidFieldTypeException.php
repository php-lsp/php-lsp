<?php

declare(strict_types=1);

namespace Lsp\Rpc\Protocol\Exception;

class InvalidFieldTypeException extends DecodingException
{
    final public const CODE_FIELD_INVALID_TYPE = parent::ERROR_CODE_LAST + 0x01;

    protected const ERROR_CODE_LAST = self::CODE_FIELD_INVALID_TYPE;

    /**
     * @param non-empty-string $field Invalid field name
     * @param non-empty-string $expected Expected value string representation
     */
    public static function fromTypeOfField(string $field, string $expected, mixed $given): static
    {
        $message = 'Received data must contain field "%s" with type %s, but %s given';
        $message = \sprintf($message, $field, $expected, \get_debug_type($given));

        return new static($message, self::CODE_FIELD_INVALID_TYPE);
    }
}
