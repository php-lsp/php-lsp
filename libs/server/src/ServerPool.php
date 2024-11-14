<?php

declare(strict_types=1);

namespace Lsp\Server;

use Lsp\Server\Address\AddressFactory;
use Lsp\Server\Address\AddressFactoryInterface;
use Lsp\Server\Address\AddressInterface;
use Lsp\Server\ListenedServerInterface as TServer;

/**
 * @template-implements \IteratorAggregate<array-key, ListenedServerInterface>
 */
abstract class ServerPool implements ServerPoolInterface, \IteratorAggregate
{
    /**
     * @var \SplObjectStorage<ListenedServerInterface, mixed>
     */
    private readonly \SplObjectStorage $servers;

    public function __construct(
        protected readonly AddressFactoryInterface $addresses = new AddressFactory(),
    ) {
        $this->servers = new \SplObjectStorage();
    }

    abstract protected function create(AddressInterface $address): TServer;

    public function listen(string|AddressInterface $dsn): TServer
    {
        if (\is_string($dsn)) {
            $dsn = $this->addresses->create($dsn);
        }

        $server = $this->create($dsn);

        $this->servers->attach($server);

        return $server;
    }

    public function close(TServer $server): void
    {
        if ($this->servers->contains($server)) {
            $this->servers->detach($server);

            $server->stop();
        }
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
