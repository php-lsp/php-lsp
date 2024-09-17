<?php

declare(strict_types=1);

namespace Lsp\Router;

use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Router\Route\MatchedRouteInterface;

final class DelegateRouter implements RouterInterface
{
    /**
     * @var list<RouterInterface>
     */
    private readonly array $routers;

    /**
     * @param iterable<mixed, RouterInterface> $routers
     */
    public function __construct(iterable $routers = [])
    {
        $this->routers = self::toRoutersList($routers);
    }

    /**
     * @param iterable<mixed, RouterInterface> $routers
     *
     * @return list<RouterInterface>
     */
    private static function toRoutersList(iterable $routers): array
    {
        return match (true) {
            $routers instanceof \Traversable => \iterator_to_array($routers, false),
            \array_is_list($routers) => $routers,
            default => \array_values($routers),
        };
    }

    public function match(NotificationInterface $request): ?MatchedRouteInterface
    {
        foreach ($this->routers as $router) {
            $route = $router->match($request);

            if ($route !== null) {
                return $route;
            }
        }

        return null;
    }
}
