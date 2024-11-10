<?php

declare(strict_types=1);

namespace Lsp\Contracts\Router;

use Lsp\Contracts\Rpc\Message\NotificationInterface;

/**
 * Representation of a matched route to some request/notification.
 */
interface MatchedRouteInterface extends RouteInterface
{
    /**
     * Returns RPC request or notification (non-identified request) for
     * the given matched route.
     */
    public function getRequest(): NotificationInterface;
}
