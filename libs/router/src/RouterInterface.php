<?php

declare(strict_types=1);

namespace Lsp\Router;

use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Router\Route\MatchedRouteInterface;

interface RouterInterface
{
    /**
     * Returns matched route for the given request (notification)
     * in case that such a route was found or {@see null} instead.
     */
    public function match(NotificationInterface $request): ?MatchedRouteInterface;
}
