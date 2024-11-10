<?php

declare(strict_types=1);

namespace Lsp\Server\React;

use Lsp\Server\React\Driver\ReactDriverConfiguration;
use React\Socket\ConnectionInterface as SocketInterface;
use React\Socket\TcpServer as SocketTcpServer;

final class ReactTcpServer extends ReactServer
{
    private readonly SocketTcpServer $socket;

    /**
     * @param non-empty-string $dsn
     */
    public function __construct(ReactDriver $driver, ReactDriverConfiguration $config, string $dsn)
    {
        parent::__construct($driver, $dsn);

        $this->socket = new SocketTcpServer($dsn, $config->loop);

        $this->socket->on('connection', function (SocketInterface $connection) use ($config): void {
            // PHP GC automatically keeps this object in memory
            // while internal callbacks are in memory.
            new ReactConnection($this, $config, $connection);
        });
    }

    public function getDriver(): ReactDriver
    {
        return $this->driver;
    }

    public function getDataSourceName(): string
    {
        return $this->dsn;
    }
}
