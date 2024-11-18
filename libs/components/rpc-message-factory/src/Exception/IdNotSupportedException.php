<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Factory\Exception;

class IdNotSupportedException extends IdException
{
    final public const ERROR_CODE_INVALID_PLATFORM = 0x01 + parent::ERROR_CODE_LAST;

    protected const ERROR_CODE_LAST = self::ERROR_CODE_INVALID_PLATFORM;

    public static function fromInvalidPlatform(string $expected, string $actual): static
    {
        $message = 'The current platform does not support %s identifiers, only %s is allowed';
        $message = \sprintf($message, $expected, $actual);

        return new static($message, self::ERROR_CODE_INVALID_PLATFORM);
    }
}
