<?php

declare(strict_types=1);

namespace Lsp\Router\Route;

use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Contracts\Router\RouteInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;

final class MatchedRoute implements MatchedRouteInterface
{
    public function __construct(
        private readonly RouteInterface $route,
        private readonly NotificationInterface $request,
    ) {}

    public function getMethod(): string
    {
        return $this->route->getMethod();
    }

    public function getHandler(): mixed
    {
        return $this->route->getHandler();
    }

    public function getRequest(): NotificationInterface
    {
        return $this->request;
    }

    public function getDefinition(): RouteInterface
    {
        return $this->route;
    }
}
