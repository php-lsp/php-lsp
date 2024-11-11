<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Exception;

final class MetaModelInvalidSpecificationException extends MetaModelException
{
    /**
     * @param non-empty-string $version
     */
    public static function fromInvalidSpecification(string $version, ?\Throwable $previous = null): self
    {
        return new self(
            message: \vsprintf('Could not find meta model for "%s" specification version', [
                ($version = \trim($version)) === '' ? '{unknown}' : $version,
            ]),
            previous: $previous,
        );
    }
}
