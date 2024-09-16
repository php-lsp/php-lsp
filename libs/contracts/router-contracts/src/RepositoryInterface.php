<?php

declare(strict_types=1);

namespace Lsp\Contracts\Router;

/**
 * @template-extends \Traversable<array-key, RouteInterface>
 */
interface RepositoryInterface extends \Traversable, \Countable
{
    /**
     * Returns expected route by the given method.
     *
     * @param non-empty-string $method
     */
    public function findByMethod(string $method): ?RouteInterface;

    /**
     * @return int<0, max> the number of routes cannot be negative
     */
    public function count(): int;
}
