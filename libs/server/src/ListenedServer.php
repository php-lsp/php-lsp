<?php

declare(strict_types=1);

namespace Lsp\Server;

use Lsp\Server\Address\AddressInterface;

abstract class ListenedServer implements ListenedServerInterface
{
    protected bool $stopped = false;

    /**
     * @var \SplObjectStorage<EstablishedClientInterface, mixed>
     */
    protected readonly \SplObjectStorage $clients;

    public function __construct(
        protected readonly ServerPoolInterface $pool,
        protected readonly AddressInterface $address,
    ) {
        $this->clients = new \SplObjectStorage();
    }

    public function getServer(): ServerPoolInterface
    {
        return $this->pool;
    }

    public function getAddress(): AddressInterface
    {
        return $this->address;
    }

    protected function attach(EstablishedClientInterface $client): void
    {
        $this->clients->attach($client);
    }

    public function close(EstablishedClientInterface $client): void
    {
        if ($this->clients->contains($client)) {
            $this->clients->detach($client);
            $client->close();
        }
    }

    public function stop(): void
    {
        if ($this->stopped === true) {
            return;
        }

        $this->stopped = true;
        $this->pool->close($this);
        $this->onStop();
    }

    abstract protected function onStop(): void;
}
