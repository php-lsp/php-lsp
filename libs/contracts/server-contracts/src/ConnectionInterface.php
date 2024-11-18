<?php

declare(strict_types=1);

namespace Lsp\Contracts\Server;

use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use React\Promise\PromiseInterface;

interface ConnectionInterface
{
    /**
     * Returns local address of the established client (i.e. connection).
     */
    public function getAddress(): AddressInterface;

    /**
     * Returns the server (that is parent) that this client is associated with.
     */
    public function getServer(): ServerInterface;

    /**
     * Notify client by a notification message.
     *
     * This method MUST not throw any exception. In case of any notification
     * errors, an exception should be returned as a result.
     */
    public function notify(NotificationInterface $notification): ?\Throwable;

    /**
     * Execute the method by a request message.
     *
     * @template TArgIdentifier of mixed
     *
     * @param RequestInterface<TArgIdentifier> $request
     *
     * @return PromiseInterface<ResponseInterface<TArgIdentifier>>
     */
    public function call(RequestInterface $request): PromiseInterface;

    /**
     * Closes established connection.
     */
    public function close(): void;
}
