<?php

declare(strict_types=1);

namespace Lsp\Contracts\Hydrator\Exception;

/**
 * An exception that occurs in case of errors during mapping process.
 */
interface MappingExceptionInterface extends MarshallingExceptionInterface
{
    /**
     * Expected type string representation.
     *
     * @return non-empty-string
     */
    public function getExpectedType(): string;
}
