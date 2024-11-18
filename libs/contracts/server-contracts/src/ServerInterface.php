<?php

declare(strict_types=1);

namespace Lsp\Contracts\Server;

/**
 * @template-extends \Traversable<array-key, ConnectionInterface>
 */
interface ServerInterface extends \Traversable, \Countable
{
    /**
     * Returns the parent server pool (manager) instance for this server.
     */
    public function getManager(): ManagerInterface;

    /**
     * Returns the name of the data source that this server is connected to.
     */
    public function getAddress(): AddressInterface;

    /**
     * Closes existing established client.
     */
    public function close(ConnectionInterface $client): void;

    /**
     * Returns number of the established connections.
     *
     * @return int<0, max>
     */
    public function count(): int;

    /**
     * Forces the application to stop running.
     */
    public function stop(): void;
}
