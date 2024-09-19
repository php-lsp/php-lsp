<?php

declare(strict_types=1);

namespace Lsp\Dispatcher;

use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;

interface DispatcherInterface
{
    /**
     * Notify server by a notification message.
     */
    public function notify(NotificationInterface $notification): void;

    /**
     * Execute the method by a request message.
     *
     * @template TArgIdentifier of mixed
     *
     * @param RequestInterface<TArgIdentifier> $request
     *
     * @return ResponseInterface<TArgIdentifier>
     */
    public function call(RequestInterface $request): ResponseInterface;
}
