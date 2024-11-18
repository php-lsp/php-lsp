<?php

declare(strict_types=1);

namespace Lsp\Server;

use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Contracts\Rpc\Message\FailureResponseInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use Lsp\Contracts\Rpc\Message\SuccessfulResponseInterface;
use Lsp\Contracts\Server\AddressInterface;
use Lsp\Contracts\Server\ConnectionInterface;
use Lsp\Contracts\Server\ServerInterface;
use Lsp\Dispatcher\DispatcherInterface;
use Lsp\Server\Connection\IncrementalBuffer;
use Lsp\Server\Connection\PendingResponsePool;
use Lsp\Server\Driver\ConnectionDriverInterface;
use Lsp\Server\Event\Connection\ConnectionClosed;
use Lsp\Server\Event\Message\FailureResponseReceived;
use Lsp\Server\Event\Message\FailureResponseSent;
use Lsp\Server\Event\Message\MessageReceived;
use Lsp\Server\Event\Message\MessageSent;
use Lsp\Server\Event\Message\NotificationReceived;
use Lsp\Server\Event\Message\NotificationSent;
use Lsp\Server\Event\Message\RequestReceived;
use Lsp\Server\Event\Message\RequestSent;
use Lsp\Server\Event\Message\ResponseReceived;
use Lsp\Server\Event\Message\ResponseSent;
use Lsp\Server\Event\Message\SuccessfulResponseReceived;
use Lsp\Server\Event\Message\SuccessfulResponseSent;
use Psr\EventDispatcher\EventDispatcherInterface;
use React\Promise\PromiseInterface;

final class Connection implements ConnectionInterface
{
    private readonly IncrementalBuffer $buffer;

    private readonly PendingResponsePool $responses;

    private bool $closed = false;

    /**
     * @param EncoderInterface<MessageInterface> $encoder
     * @param DecoderInterface<MessageInterface> $decoder
     */
    public function __construct(
        private readonly ServerInterface $parent,
        private readonly ConnectionDriverInterface $driver,
        private readonly EncoderInterface $encoder,
        private readonly DecoderInterface $decoder,
        private readonly DispatcherInterface $dispatcher,
        private readonly EventDispatcherInterface $events,
        private readonly ConnectionStore $store,
    ) {
        $this->responses = new PendingResponsePool();
        $this->buffer = new IncrementalBuffer($this->decoder);

        $this->driver->onData(function (string $chunk): void {
            foreach ($this->buffer->push($chunk) as $message) {
                $this->onMessageReceived($message);
            }
        });

        $this->driver->onError($this->onError(...));

        $this->driver->onClose(function () {
            $this->parent->close($this);
        });
    }

    private function onError(\Throwable $e): void
    {
        // TODO
    }

    private function onMessageSentError(\Throwable $e, MessageInterface $message): void
    {
        // TODO
    }

    private function onMessageReceivedError(\Throwable $e, MessageInterface $message): void
    {
        // TODO
    }

    private function beforeMessageReceived(MessageInterface $message): void
    {
        $this->events->dispatch(new MessageReceived(
            message: $message,
            connection: $this,
        ));

        if ($message instanceof NotificationInterface) {
            $this->events->dispatch(new NotificationReceived(
                notification: $message,
                connection: $this,
            ));

            if ($message instanceof RequestInterface) {
                $this->events->dispatch(new RequestReceived(
                    request: $message,
                    connection: $this,
                ));
            }

            return;
        }

        if ($message instanceof ResponseInterface) {
            $this->events->dispatch(new ResponseReceived(
                response: $message,
                connection: $this,
            ));

            if ($message instanceof SuccessfulResponseInterface) {
                $this->events->dispatch(new SuccessfulResponseReceived(
                    response: $message,
                    connection: $this,
                ));
            } elseif ($message instanceof FailureResponseInterface) {
                $this->events->dispatch(new FailureResponseReceived(
                    response: $message,
                    connection: $this,
                ));
            }
        }
    }

    private function beforeMessageSent(MessageInterface $message): void
    {
        $this->events->dispatch(new MessageSent(
            message: $message,
            connection: $this,
        ));

        if ($message instanceof NotificationInterface) {
            $this->events->dispatch(new NotificationSent(
                notification: $message,
                connection: $this,
            ));

            if ($message instanceof RequestInterface) {
                $this->events->dispatch(new RequestSent(
                    request: $message,
                    connection: $this,
                ));
            }

            return;
        }

        if ($message instanceof ResponseInterface) {
            $this->events->dispatch(new ResponseSent(
                response: $message,
                connection: $this,
            ));

            if ($message instanceof SuccessfulResponseInterface) {
                $this->events->dispatch(new SuccessfulResponseSent(
                    response: $message,
                    connection: $this,
                ));
            } elseif ($message instanceof FailureResponseInterface) {
                $this->events->dispatch(new FailureResponseSent(
                    response: $message,
                    connection: $this,
                ));
            }
        }
    }

    private function onMessageReceived(MessageInterface $message): void
    {
        $this->store->remember($message, $this);

        $this->beforeMessageReceived($message);

        try {
            switch (true) {
                case $message instanceof RequestInterface:
                    $response = $this->dispatcher->call($message);

                    $this->send($response);
                    break;

                case $message instanceof NotificationInterface:
                    $response = $this->dispatcher->notify($message);

                    if ($response !== null) {
                        $this->send($response);
                    }
                    break;

                case $message instanceof ResponseInterface:
                    $this->responses->resolve($message);
                    break;
            }
        } catch (\Throwable $e) {
            $this->onMessageReceivedError($e, $message);
        }
    }

    public function getAddress(): AddressInterface
    {
        return $this->driver->getAddress();
    }

    public function getServer(): ServerInterface
    {
        return $this->parent;
    }

    /**
     * @throws \Throwable
     */
    private function send(MessageInterface $message): void
    {
        $this->beforeMessageSent($message);

        $encoded = $this->encoder->encode($message);

        $this->write($encoded, [
            'Content-Length' => (string) \strlen($encoded),
        ]);
    }

    /**
     * @param iterable<non-empty-string, string> $headers
     */
    private function write(string $data, iterable $headers = []): void
    {
        $message = '';

        foreach ($headers as $name => $value) {
            $message .= "$name: $value\r\n";
        }

        $message .= "\r\n$data";

        $this->driver->write($message);
    }

    public function notify(NotificationInterface $notification): ?\Throwable
    {
        try {
            $this->send($notification);
        } catch (\Throwable $e) {
            $this->onMessageSentError($e, $notification);

            return $e;
        }

        return null;
    }

    public function call(RequestInterface $request): PromiseInterface
    {
        try {
            $this->send($request);

            return $this->responses->await($request);
        } catch (\Throwable $e) {
            $this->onMessageSentError($e, $request);

            throw $e;
        }
    }

    public function close(): void
    {
        if ($this->closed === false) {
            $this->closed = true;

            $this->parent->close($this);
            $this->driver->close();

            $this->events->dispatch(new ConnectionClosed(
                connection: $this,
            ));
        }
    }
}
