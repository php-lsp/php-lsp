<?php

declare(strict_types=1);

namespace Lsp\Router\Builder;

use Lsp\Router\Handler\HandlerInterface;
use Lsp\Router\Route\Route;
use Lsp\Router\Route\RouteInterface;
use Lsp\Router\Router;
use Lsp\Router\RouterInterface;

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
     * @param non-empty-string $method
     */
    private function createRouteAndAdd(string $method, HandlerInterface $handler): self
    {
        $this->routes[] = new Route($method, $handler);

        return $this;
    }

    /**
     * @param non-empty-string $method
     */
    public function add(string $method, HandlerInterface $handler): self
    {
        return $this->createRouteAndAdd($method, $handler);
    }

    /**
     * @param iterable<non-empty-string, HandlerInterface> $routes
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
