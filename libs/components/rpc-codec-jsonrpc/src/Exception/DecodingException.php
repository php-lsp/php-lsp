<?php

declare(strict_types=1);

namespace Lsp\Rpc\Codec\Exception;

use Lsp\Contracts\Rpc\Codec\Exception\DecodingExceptionInterface;

class DecodingException extends CodecException implements DecodingExceptionInterface
{
    final public const CODE_NO_FACTORY_IMPLEMENTATION = 0x01;

    protected const ERROR_CODE_LAST = self::CODE_NO_FACTORY_IMPLEMENTATION;

    public static function fromInternalDecodingError(string $message, int $code = 0x00): static
    {
        $error = 'An error occurred while decoding data: (0x%04X) %s';
        $error = \sprintf($message, $code, $error);

        return new static($error, self::CODE_NO_FACTORY_IMPLEMENTATION);
    }
}
