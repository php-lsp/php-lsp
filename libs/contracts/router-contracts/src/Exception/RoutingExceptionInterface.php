<?php

declare(strict_types=1);

namespace Lsp\Contracts\Router\Exception;

use Lsp\Contracts\Rpc\Message\NotificationInterface;

/**
 * Occurs when there is a routing runtime error.
 */
interface RoutingExceptionInterface extends RouterExceptionInterface
{
    /**
     * Returns the request or notification object that contained the error.
     */
    public function getRequest(): NotificationInterface;
}
