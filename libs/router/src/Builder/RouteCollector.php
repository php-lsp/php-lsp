<?php

declare(strict_types=1);

namespace Lsp\Router\Builder;

use Lsp\Router\Handler\HandlerInterface;
use Lsp\Router\Route\Route;
use Lsp\Router\Route\RouteInterface;
use Lsp\Router\Router;
use Lsp\Router\RouterInterface;

final class RouteCollector implements BuilderInterface
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

    public function build(): RouterInterface
    {
        return new Router($this->routes);
    }
}
