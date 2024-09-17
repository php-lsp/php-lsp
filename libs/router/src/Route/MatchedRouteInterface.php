<?php

declare(strict_types=1);

namespace Lsp\Router\Route;

use Lsp\Contracts\Rpc\Message\NotificationInterface;

interface MatchedRouteInterface extends RouteInterface
{
    /**
     * Returns RPC request or notification (non-identified request) for
     * the given matched route.
     */
    public function getRequest(): NotificationInterface;

    /**
     * Returns original route definition instance for the given matched route.
     */
    public function getDefinition(): RouteInterface;
}
