<?php

declare(strict_types=1);

namespace Lsp\Contracts\Hydrator;

use Lsp\Contracts\Hydrator\Exception\HydratorExceptionInterface;
use Lsp\Contracts\Hydrator\Exception\MarshallingExceptionInterface;

/**
 * The implementation of this interface provides the ability to transform
 * specific objects into generic data.
 */
interface ExtractorInterface
{
    /**
     * Method for converting specific objects to generic ones.
     *
     * An example:
     * ```php
     * $dto = new ExampleDTO(
     *     id: 42,
     *     name: 'Vasya',
     * );
     *
     * $data = $extractor->extract($dto);
     *
     * // array(2) [
     * //   id => int(42),
     * //   name => string("Vasya"),
     * // ]
     * ```
     *
     * @throws HydratorExceptionInterface the general exception that occurs
     *         in case of hydrator errors
     * @throws MarshallingExceptionInterface an exception that occurs in case
     *         of errors during extraction process
     */
    public function extract(mixed $data): mixed;
}
