<?php

declare(strict_types=1);

namespace Lsp\Rpc\Protocol\Exception;

class InvalidFieldValueException extends DecodingException
{
    final public const CODE_FIELD_CONTAINS_INVALID_VALUE = parent::ERROR_CODE_LAST + 0x01;

    protected const ERROR_CODE_LAST = self::CODE_FIELD_CONTAINS_INVALID_VALUE;

    /**
     * @param non-empty-string $field Invalid field name
     * @param non-empty-string $expected Expected value string representation
     */
    public static function fromValueOfField(string $field, string $expected, mixed $given): static
    {
        $message = 'Received data must contain field "%s" with value %s, but %s given';
        $message = \sprintf($message, $field, $expected, self::valueToString($given));

        return new static($message, self::CODE_FIELD_CONTAINS_INVALID_VALUE);
    }

    /**
     * @return non-empty-string
     */
    private static function valueToString(mixed $value): string
    {
        /** @var non-empty-string */
        return match (true) {
            \is_string($value) => \sprintf('"%s"', \addslashes($value)),
            $value === true => 'true',
            $value === false => 'false',
            $value === null => 'null',
            \is_int($value), \is_float($value) => (string) $value,
            \is_object($value) => 'object',
            default => \get_debug_type($value),
        };
    }
}
