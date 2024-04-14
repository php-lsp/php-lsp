<?php

declare(strict_types=1);

namespace Lsp\Contracts\Hydrator\Exception;

/**
 * An exception that occurs in case of errors during marshalling process.
 */
interface MarshallingExceptionInterface extends HydratorExceptionInterface
{
    /**
     * Returns path to the failed field in the format:
     *
     * ```php
     *  ['path', 'to', 'fieldName']
     * ```
     *
     * In the case that the method {@see getPath()} returns
     * an empty {@see array}, then a mapping error occurred at the root.
     *
     * @return list<non-empty-string>
     */
    public function getPath(): array;

    /**
     * Actual type string representation.
     *
     * In the case that the method {@see getActualType()} returns {@see null},
     * then the value for the required field was not passed.
     *
     * @return non-empty-string|null
     */
    public function getActualType(): ?string;
}
