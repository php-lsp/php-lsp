<?php

declare(strict_types=1);

namespace Lsp\Server;

use Lsp\Server\Address\AddressInterface;

interface ListenedServerInterface extends ServerInterface
{
    /**
     * Returns the server pool (that is parent) instance for this server.
     */
    public function getServer(): ServerPoolInterface;

    /**
     * Returns the name of the data source that this server is connected to.
     */
    public function getAddress(): AddressInterface;

    /**
     * Closes existing established client.
     */
    public function close(EstablishedClientInterface $client): void;
}
