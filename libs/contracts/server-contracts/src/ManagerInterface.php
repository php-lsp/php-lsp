<?php

declare(strict_types=1);

namespace Lsp\Contracts\Server;

/**
 * @template-extends \Traversable<array-key, ServerInterface>
 */
interface ManagerInterface extends \Traversable, \Countable
{
    /**
     * Establishing a new server connection.
     *
     * @param non-empty-string|\Stringable $dsn
     */
    public function listen(string|\Stringable|AddressInterface $dsn): ServerInterface;

    /**
     * Closes existing listened server.
     */
    public function detach(ServerInterface $server): void;

    /**
     * Returns number of the listened servers.
     *
     * @return int<0, max>
     */
    public function count(): int;

    /**
     * Forces the application to stop running.
     */
    public function stop(): void;
}
