<?php

declare(strict_types=1);

namespace Lsp\Contracts\Hydrator;

use Lsp\Contracts\Hydrator\Exception\HydratorExceptionInterface;

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
     * @throws HydratorExceptionInterface The general exception that occurs
     *         in case of hydrator errors.
     */
    public function extract(mixed $data): mixed;
}
