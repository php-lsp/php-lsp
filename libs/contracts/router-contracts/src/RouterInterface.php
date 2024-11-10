<?php

declare(strict_types=1);

namespace Lsp\Contracts\Router;

use Lsp\Contracts\Router\Exception\RoutingExceptionInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;

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
     * @api
     *
     * @throws RoutingExceptionInterface if no route was found for the given
     *         request (notification) payload
     */
    public function matchOrFail(NotificationInterface $request): MatchedRouteInterface;
}
