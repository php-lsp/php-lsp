<?php

declare(strict_types=1);

namespace Lsp\Server\Event\Message;

use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Server\ConnectionInterface;

class NotificationReceived extends MessageReceived
{
    public function __construct(
        NotificationInterface $notification,
        ConnectionInterface $connection,
    ) {
        parent::__construct($notification, $connection);
    }
}
