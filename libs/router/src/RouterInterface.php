<?php

declare(strict_types=1);

namespace Lsp\Router;

use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Router\Exception\RoutingExceptionInterface;
use Lsp\Router\Route\MatchedRouteInterface;

interface RouterInterface
{
    /**
     * Returns matched route for the given request (notification)
     * in case that such a route was found or {@see null} instead.
     */
    public function match(NotificationInterface $request): ?MatchedRouteInterface;

    /**
     * Same as {@see self::match()} however, it returns an exception if there
     * is no route for the given request (notification) payload.
     *
     * @throws RoutingExceptionInterface if no route was found for the given
     *         request (notification) payload
     */
    public function matchOrFail(NotificationInterface $request): MatchedRouteInterface;
}
