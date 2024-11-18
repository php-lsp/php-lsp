<?php

declare(strict_types=1);

namespace Lsp\Server\Event\Message;

use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Server\ConnectionInterface;

class RequestReceived extends NotificationReceived
{
    /**
     * @param RequestInterface<mixed> $request
     */
    public function __construct(
        RequestInterface $request,
        ConnectionInterface $connection,
    ) {
        parent::__construct($request, $connection);
    }
}
