<?php

declare(strict_types=1);

namespace Lsp\Rpc\Codec\Exception;

use Lsp\Contracts\Rpc\Codec\Exception\EncodingExceptionInterface;

class EncodingException extends CodecException implements EncodingExceptionInterface
{
    final public const CODE_ENCODING = 0x01;

    protected const ERROR_CODE_LAST = self::CODE_ENCODING;

    public static function fromInternalEncodingError(string $message, int $code): static
    {
        $message = 'An error occurred while encoding data: ' . $message;

        return new static($message, self::CODE_ENCODING + $code);
    }
}
