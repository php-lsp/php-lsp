<?php

declare(strict_types=1);

namespace Lsp\Server;

use Lsp\Server\Address\AddressInterface;

/**
 * @template-extends \Traversable<array-key, ListenedServerInterface>
 */
interface ServerPoolInterface extends ServerInterface, \Traversable, \Countable
{
    /**
     * @param non-empty-string|AddressInterface $dsn
     */
    public function listen(string|AddressInterface $dsn): ListenedServerInterface;

    /**
     * Closes existing listened server.
     */
    public function close(ListenedServerInterface $server): void;

    /**
     * Returns positive number of listened servers.
     *
     * @return int<0, max>
     */
    public function count(): int;
}
