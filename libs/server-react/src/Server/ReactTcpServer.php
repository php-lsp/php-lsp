<?php

declare(strict_types=1);

namespace Lsp\Server\React\Server;

use Lsp\Contracts\Dispatcher\DispatcherInterface;
use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Server\React\ReactConnection;
use Lsp\Server\React\ReactDriver;
use Psr\EventDispatcher\EventDispatcherInterface;
use React\EventLoop\LoopInterface;
use React\Socket\ConnectionInterface as SocketInterface;
use React\Socket\TcpServer as SocketTcpServer;

/**
 * @internal this is an internal library class, please do not use it in your code
 * @psalm-internal Lsp\Server\React
 */
final class ReactTcpServer extends ReactServer
{
    private readonly SocketTcpServer $socket;

    /**
     * @param non-empty-string $dsn
     */
    public function __construct(
        ReactDriver $driver,
        string $dsn,
        LoopInterface $loop,
        private readonly DecoderInterface $decoder,
        private readonly EncoderInterface $encoder,
        private readonly DispatcherInterface $dispatcher,
        private readonly EventDispatcherInterface $events,
    ) {
        parent::__construct($driver, $dsn);

        $this->socket = new SocketTcpServer($dsn, $loop);

        $this->listen();
    }

    private function listen(): void
    {
        $this->socket->on('connection', function (SocketInterface $connection): void {
            // PHP GC automatically keeps this object in memory
            // while internal callbacks are in memory.
            new ReactConnection(
                server: $this,
                connection: $connection,
                decoder: $this->decoder,
                encoder: $this->encoder,
                dispatcher: $this->dispatcher,
                events: $this->events,
            );
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
