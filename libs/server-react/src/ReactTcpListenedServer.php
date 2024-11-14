<?php

declare(strict_types=1);

namespace Lsp\Server\React;

use Lsp\Server\Address\AddressInterface;
use Lsp\Server\Address\TcpNetworkAddress;
use Lsp\Server\ListenedServer;
use Lsp\Server\ServerPoolInterface;
use React\Socket\ConnectionInterface as SocketInterface;
use React\Socket\TcpServer as SocketTcpServer;

final class ReactTcpListenedServer extends ListenedServer
{
    private readonly SocketTcpServer $socket;

    public function __construct(
        private readonly ReactServerConfiguration $config,
        ServerPoolInterface $pool,
        TcpNetworkAddress $address,
    ) {
        parent::__construct($pool, $address);

        $this->socket = new SocketTcpServer((string) $address, $config->loop);

        $this->listen($this->socket);
    }

    private function listen(SocketTcpServer $server): void
    {
        $server->on('connection', function (SocketInterface $connection): void {
            $this->attach($this->createEstablishedClient($connection));
        });

        $server->once('close', function () {
            $this->stop();
        });
    }

    private function createEstablishedClient(SocketInterface $connection): ReactEstablishedClient
    {
        return new ReactEstablishedClient(
            connection: $connection,
            config: $this->config,
            server: $this,
            address: $this->getRemoteAddress($connection),
        );
    }

    private function getRemoteAddress(SocketInterface $connection): AddressInterface
    {
        $address = $connection->getRemoteAddress();

        return $this->config->addresses->create(
            dsn: $address === null || $address === '' ? 'tcp://' : $address,
        );
    }

    protected function onStop(): void
    {
        $this->socket->close();
    }
}
