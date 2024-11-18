<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Exception;

final class MetaModelNotReadableException extends MetaModelException
{
    public static function fromNotReadableFile(string $pathname, ?\Throwable $previous = null): self
    {
        return new self(
            message: \vsprintf('Could not read meta model "%s" file', [
                ($pathname = \trim($pathname)) === '' ? '{unknown}' : $pathname,
            ]),
            previous: $previous,
        );
    }
}
