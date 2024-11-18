<?php

declare(strict_types=1);

namespace Lsp\Server\Driver\React;

use Lsp\Contracts\Server\AddressInterface;
use React\Socket\ConnectionInterface as SocketInterface;

final class ReactSocketConnectionDriver extends ReactConnectionDriver
{
    public function __construct(
        private readonly SocketInterface $socket,
        AddressInterface $address,
    ) {
        parent::__construct($address);
    }

    public function write(string $data): void
    {
        $this->socket->write($data);
    }

    public function onData(\Closure $then): void
    {
        $this->socket->on('data', $then);
    }

    public function onError(\Closure $then): void
    {
        $this->socket->on('error', $then);
    }

    public function onClose(\Closure $then): void
    {
        $this->socket->once('close', $then);
    }

    public function close(): void
    {
        $this->socket->close();
        $this->socket->removeAllListeners();
    }
}
