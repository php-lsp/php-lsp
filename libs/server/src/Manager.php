<?php

declare(strict_types=1);

namespace Lsp\Server;

use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Server\ManagerInterface;
use Lsp\Contracts\Server\ServerInterface;
use Lsp\Dispatcher\DispatcherInterface;
use Lsp\Server\Driver\DriverInterface;
use Lsp\Server\Event\Server\ServerListen;
use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * @template-implements \IteratorAggregate<array-key, ServerInterface>
 */
final class Manager implements ManagerInterface, \IteratorAggregate
{
    /**
     * @var \SplObjectStorage<ServerInterface, mixed>
     */
    private readonly \SplObjectStorage $servers;

    /**
     * @param EncoderInterface<MessageInterface> $encoder
     * @param DecoderInterface<MessageInterface> $decoder
     */
    public function __construct(
        private readonly DriverInterface $driver,
        private readonly EncoderInterface $encoder,
        private readonly DecoderInterface $decoder,
        private readonly DispatcherInterface $dispatcher,
        private readonly EventDispatcherInterface $events,
    ) {
        $this->servers = new \SplObjectStorage();
    }

    public function listen(string|\Stringable $dsn): ServerInterface
    {
        $server = new Server(
            parent: $this,
            driver: $this->driver->create($dsn),
            encoder: $this->encoder,
            decoder: $this->decoder,
            dispatcher: $this->dispatcher,
            events: $this->events,
        );

        $this->servers->attach($server);

        $this->events->dispatch(new ServerListen(
            server: $server,
        ));

        return $server;
    }

    public function detach(ServerInterface $server): void
    {
        if ($this->servers->contains($server)) {
            $this->servers->detach($server);
            $server->stop();
        }
    }

    public function stop(): void
    {
        $this->driver->stop();
    }

    public function count(): int
    {
        return $this->servers->count();
    }

    public function getIterator(): \Traversable
    {
        return $this->servers;
    }
}
