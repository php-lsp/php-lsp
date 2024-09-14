<?php

declare(strict_types=1);

namespace Lsp\Contracts\Hydrator;

use Lsp\Contracts\Hydrator\Exception\HydratorExceptionInterface;
use Lsp\Contracts\Hydrator\Exception\MappingExceptionInterface;

/**
 * The implementation of this interface provides the ability to denormalize
 * arbitrary data into concrete objects.
 */
interface HydratorInterface
{
    /**
     * Method for converting arbitrary data into specific objects.
     *
     * An example:
     *
     * ```php
     * $dto = $hydrator->hydrate(ExampleDTO::class, [
     *      'id' => 42,
     *      'name' => 'Vasya',
     * ]);
     *
     * // object(ExampleDTO) {
     * //   id: int(42),
     * //   name: string("Vasya"),
     * // }
     * ```
     *
     * @template TObject of object
     *
     * @param class-string<TObject>|non-empty-string $type
     *
     * @return ($type is class-string ? TObject : mixed)
     * @throws HydratorExceptionInterface the general exception that occurs
     *         in case of hydrator errors
     * @throws MappingExceptionInterface an exception that occurs in case
     *         of errors during mapping process
     */
    public function hydrate(string $type, mixed $data): mixed;
}
