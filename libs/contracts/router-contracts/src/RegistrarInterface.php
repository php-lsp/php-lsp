<?php

declare(strict_types=1);

namespace Lsp\Contracts\Router;

/**
 * @phpstan-import-type RouteHandlerType from RouteInterface
 * @psalm-import-type RouteHandlerType from RouteInterface
 */
interface RegistrarInterface extends RepositoryInterface
{
    /**
     * Imperatively adds (registers) a new route to the current repository.
     *
     * @template TArgRoute of RouteInterface
     *
     * @param TArgRoute $route
     *
     * @return TArgRoute
     */
    public function add(RouteInterface $route): RouteInterface;

    /**
     * @param non-empty-string $method
     *
     * @phpstan-param RouteHandlerType $handler
     *
     * @psalm-param RouteHandlerType $handler
     */
    public function createAndAdd(string $method, \Closure $handler): RouteInterface;
}
