<?php

declare(strict_types=1);

namespace Lsp\Server\React;

use Lsp\Server\Address\AddressInterface;
use Lsp\Server\Address\TcpNetworkAddress;
use Lsp\Server\ListenedServer;
use Lsp\Server\ServerPoolInterface;
use Psr\Log\LoggerInterface;
use React\Socket\ConnectionInterface as SocketInterface;
use React\Socket\TcpServer as SocketTcpServer;

final class ReactTcpListenedServer extends ListenedServer
{
    private readonly SocketTcpServer $socket;

    public function __construct(
        private readonly ReactServerConfiguration $config,
        ServerPoolInterface $pool,
        TcpNetworkAddress $address,
        private readonly ?LoggerInterface $logger = null,
    ) {
        parent::__construct($pool, $address);

        $this->socket = new SocketTcpServer((string) $address, $config->loop);

        $this->listen($this->socket);
    }

    private function listen(SocketTcpServer $server): void
    {
        $this->logger?->debug('[server] Listening on {address}', [
            'address' => $this->socket->getAddress(),
        ]);

        $server->on('connection', function (SocketInterface $connection): void {
            $this->attach($this->createEstablishedClient($connection));
        });

        $server->once('close', function () {
            $this->logger?->debug('[server] Stop listening on {address}', [
                'address' => $this->socket->getAddress(),
            ]);

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
            logger: $this->logger,
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
