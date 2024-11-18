<?php

declare(strict_types=1);

namespace Lsp\Server;

use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Server\ConnectionInterface;

final class ConnectionStore implements ConnectionProviderInterface
{
    /**
     * @var \WeakMap<MessageInterface, ConnectionInterface|null>
     */
    private readonly \WeakMap $connections;

    public function __construct()
    {
        $this->connections = new \WeakMap();
    }

    public function getConnection(MessageInterface $message): ?ConnectionInterface
    {
        return $this->connections[$message];
    }

    public function remember(MessageInterface $message, ConnectionInterface $connection): void
    {
        // @phpstan-ignore-next-line
        $this->connections[$message] = $connection;
    }
}
