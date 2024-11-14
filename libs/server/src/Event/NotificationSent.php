<?php

declare(strict_types=1);

namespace Lsp\Server\Event;

use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Server\EstablishedClientInterface;

class NotificationSent extends MessageSent
{
    public function __construct(
        NotificationInterface $notification,
        EstablishedClientInterface $connection,
    ) {
        parent::__construct($notification, $connection);
    }
}
