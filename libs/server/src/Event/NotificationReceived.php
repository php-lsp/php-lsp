<?php

declare(strict_types=1);

namespace Lsp\Server\Event;

use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Server\ConnectionInterface;

class NotificationReceived extends MessageReceived
{
    public function __construct(
        NotificationInterface $notification,
        ConnectionInterface $connection,
    ) {
        parent::__construct($notification, $connection);
    }
}
