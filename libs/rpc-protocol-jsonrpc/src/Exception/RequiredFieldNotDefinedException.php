<?php

declare(strict_types=1);

namespace Lsp\Rpc\Protocol\Exception;

class RequiredFieldNotDefinedException extends DecodingException
{
    /**
     * @final
     */
    public const CODE_FIELD_MISSING = parent::ERROR_CODE_LAST + 0x01;

    protected const ERROR_CODE_LAST = self::CODE_FIELD_MISSING;

    /**
     * @param non-empty-string $field Missing field name
     */
    public static function fromField(string $field): static
    {
        $message = 'Received data is missing a required field "%s"';
        $message = \sprintf($message, $field);

        return new static($message, self::CODE_FIELD_MISSING);
    }
}
