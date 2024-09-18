<?php

declare(strict_types=1);

namespace Lsp\Router\Exception;

use Lsp\Contracts\Rpc\Message\NotificationInterface;

interface RoutingExceptionInterface extends RouterExceptionInterface
{
    public function getRequest(): NotificationInterface;
}
