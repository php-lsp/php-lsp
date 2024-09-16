<?php

declare(strict_types=1);

namespace Lsp\Contracts\Router;

use Lsp\Contracts\Rpc\Message\NotificationInterface;

interface RouterInterface
{
    /**
     * Returns matched route for the given request (notification)
     * in case that such a route was found or {@see null} instead.
     */
    public function match(NotificationInterface $request): ?MatchedRouteInterface;
}
