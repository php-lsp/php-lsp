<?php

declare(strict_types=1);

namespace Lsp\Contracts\Server\Event;

use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Server\ConnectionInterface;

class MessageReceived
{
    public function __construct(
        public readonly MessageInterface $message,
        public readonly ConnectionInterface $connection,
    ) {}
}
