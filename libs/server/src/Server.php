<?php

declare(strict_types=1);

namespace Lsp\Server;

use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Dispatcher\DispatcherInterface;
use Lsp\Server\Address\AddressInterface;
use Lsp\Server\Driver\ConnectionDriverInterface;
use Lsp\Server\Driver\ServerDriverInterface;
use Lsp\Server\Event\Connection\ConnectionEstablished;
use Lsp\Server\Event\Server\ServerStopped;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * @template-implements \IteratorAggregate<array-key, ConnectionInterface>
 */
final class Server implements ServerInterface, \IteratorAggregate
{
    /**
     * @var \SplObjectStorage<ConnectionInterface, mixed>
     */
    private readonly \SplObjectStorage $connections;

    private bool $detached = false;

    /**
     * @param EncoderInterface<MessageInterface> $encoder
     * @param DecoderInterface<MessageInterface> $decoder
     */
    public function __construct(
        private readonly ManagerInterface $parent,
        private readonly ServerDriverInterface $driver,
        private readonly EncoderInterface $encoder,
        private readonly DecoderInterface $decoder,
        private readonly DispatcherInterface $dispatcher,
        private readonly EventDispatcherInterface $events,
    ) {
        $this->connections = new \SplObjectStorage();

        $this->driver->onEstablished(function (ConnectionDriverInterface $driver): void {
            $connection = new Connection(
                parent: $this,
                driver: $driver,
                encoder: $this->encoder,
                decoder: $this->decoder,
                dispatcher: $this->dispatcher,
                events: $this->events,
            );

            $this->connections->attach($connection);

            $this->events->dispatch(new ConnectionEstablished(
                connection: $connection,
            ));
        });
    }

    public function getManager(): ManagerInterface
    {
        return $this->parent;
    }

    public function getAddress(): AddressInterface
    {
        return $this->driver->getAddress();
    }

    public function close(ConnectionInterface $client): void
    {
        if ($this->connections->contains($client)) {
            $this->connections->detach($client);
            $client->close();
        }
    }

    public function stop(): void
    {
        if ($this->detached === false) {
            $this->detached = true;

            $this->parent->detach($this);
            $this->driver->close();

            $this->events->dispatch(new ServerStopped(
                server: $this,
            ));
        }
    }

    public function getIterator(): \Traversable
    {
        foreach ($this->connections as $connection) {
            yield $connection;
        }
    }

    public function count(): int
    {
        return $this->connections->count();
    }
}
