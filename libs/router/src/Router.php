<?php

declare(strict_types=1);

namespace Lsp\Router;

use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Router\Exception\RouteNotFoundException;
use Lsp\Router\Route\MatchedRoute;
use Lsp\Router\Route\MatchedRouteInterface;
use Lsp\Router\Route\RouteInterface;

final class Router implements RouterInterface
{
    /**
     * @var array<non-empty-string, RouteInterface>
     */
    private readonly array $routes;

    /**
     * @param iterable<array-key, RouteInterface> $routes
     */
    public function __construct(iterable $routes = [])
    {
        $this->routes = \iterator_to_array(
            iterator: self::formatRoutesList($routes),
        );
    }

    /**
     * @param iterable<array-key, RouteInterface> $routes
     *
     * @return \Traversable<non-empty-string, RouteInterface>
     */
    private static function formatRoutesList(iterable $routes): \Traversable
    {
        foreach ($routes as $route) {
            yield $route->getMethod() => $route;
        }
    }

    public function match(NotificationInterface $request): ?MatchedRouteInterface
    {
        $route = $this->routes[$request->getMethod()] ?? null;

        if ($route === null) {
            return null;
        }

        return new MatchedRoute($route, $request);
    }

    public function matchOrFail(NotificationInterface $request): MatchedRouteInterface
    {
        return $this->match($request)
            ?? throw new RouteNotFoundException($request);
    }
}
