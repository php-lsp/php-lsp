<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Exception;

final class MetaModelNonDecodableException extends MetaModelException
{
    public static function fromDecodingException(string $message, ?\Throwable $previous = null): self
    {
        return new self(
            message: \vsprintf('An error occurred while decoding the meta model json file: %s', [
                ($message = \trim($message)) === '' ? '{unknown}' : $message,
            ]),
            previous: $previous,
        );
    }
}
