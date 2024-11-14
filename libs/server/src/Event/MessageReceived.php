<?php

declare(strict_types=1);

namespace Lsp\Server\Event;

use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Server\EstablishedClientInterface;

class MessageReceived
{
    public function __construct(
        public readonly MessageInterface $message,
        public readonly EstablishedClientInterface $connection,
    ) {}
}
