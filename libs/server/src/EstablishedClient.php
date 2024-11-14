<?php

declare(strict_types=1);

namespace Lsp\Server;

use Lsp\Server\Address\AddressInterface;

abstract class EstablishedClient implements EstablishedClientInterface
{
    protected bool $closed = false;

    public function __construct(
        protected readonly ListenedServerInterface $server,
        protected readonly AddressInterface $address,
    ) {}

    public function getAddress(): AddressInterface
    {
        return $this->address;
    }

    public function getServer(): ListenedServerInterface
    {
        return $this->server;
    }

    public function close(): void
    {
        if ($this->closed === true) {
            return;
        }

        $this->closed = true;
        $this->server->close($this);
        $this->onClose();
    }

    abstract protected function onClose(): void;
}
