<?php

declare(strict_types=1);

namespace Lsp\Server\React;

use Lsp\Server\Address\AddressFactoryInterface;
use Lsp\Server\Address\AddressInterface;
use React\EventLoop\LoopInterface;
use React\Socket\ConnectionInterface as SocketInterface;
use React\Socket\TcpServer as SocketTcpServer;

final class ReactTcpServerDriver extends ReactServerDriver
{
    private readonly SocketTcpServer $socket;

    public function __construct(
        LoopInterface $loop,
        AddressInterface $address,
        AddressFactoryInterface $addresses,
    ) {
        parent::__construct($loop, $address, $addresses);

        $this->socket = new SocketTcpServer((string) $address, $loop);
    }

    private function createAddress(SocketInterface $socket): AddressInterface
    {
        $remote = $socket->getRemoteAddress() ?? 'tcp://127.0.0.1:0';

        return $this->addresses->create($remote);
    }

    public function onEstablished(\Closure $then): void
    {
        $this->socket->on('connection', function (SocketInterface $socket) use ($then): void {
            $then(new ReactSocketConnectionDriver(
                socket: $socket,
                address: $this->createAddress($socket),
            ));
        });
    }

    public function close(): void
    {
        $this->socket->close();
    }
}
