<?php

declare(strict_types=1);

namespace Lsp\Router\Builder;

use Lsp\Contracts\Router\RouteInterface;
use Lsp\Contracts\Router\RouterInterface;
use Lsp\Router\Route\Route;
use Lsp\Router\Router;

/**
 * @template-implements \IteratorAggregate<array-key, RouteInterface>
 */
final class RouteCollector implements BuilderInterface, \IteratorAggregate
{
    /**
     * @var list<RouteInterface>
     */
    private array $routes = [];

    /**
     * @api
     *
     * @param non-empty-string $method
     */
    public function add(string $method, mixed $handler): self
    {
        $this->routes[] = new Route($method, $handler);

        return $this;
    }

    /**
     * @api
     *
     * @param iterable<non-empty-string, mixed> $routes
     */
    public function addMany(iterable $routes): self
    {
        foreach ($routes as $method => $handler) {
            $this->add($method, $handler);
        }

        return $this;
    }

    public function build(): RouterInterface
    {
        return new Router($this->routes);
    }

    public function getIterator(): \Traversable
    {
        yield from $this->routes;
    }

    public function count(): int
    {
        return \count($this->routes);
    }
}
