<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Hydrator;

/**
 * @template TEntity of object
 * @template TRawData of array<array-key, mixed>
 */
abstract class Hydrator
{
    /**
     * @param TRawData $data
     *
     * @return TEntity
     */
    abstract public function hydrate(array $data): object;

    /**
     * @param TRawData|null $data
     *
     * @return ($data is null ? null : TEntity)
     */
    public function hydrateOrNull(?array $data): ?object
    {
        if ($data === null) {
            return null;
        }

        return $this->hydrate($data);
    }

    /**
     * @template TArgKey of array-key
     *
     * @param iterable<TArgKey, TRawData> $data
     *
     * @return array<TArgKey, TEntity>
     */
    public function hydrateAll(iterable $data): array
    {
        $result = [];

        foreach ($data as $key => $entry) {
            $result[$key] = $this->hydrate($entry);
        }

        return $result;
    }

    /**
     * @template TArgKey of array-key
     *
     * @param iterable<TArgKey, TRawData>|null $data
     *
     * @return ($data is null ? null : array<TArgKey, TEntity>)
     */
    public function hydrateAllOrNull(?iterable $data): ?array
    {
        if ($data === null) {
            return null;
        }

        return $this->hydrateAll($data);
    }
}
