<?php

declare(strict_types=1);

namespace Lsp\Server\React;

use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Contracts\Rpc\Codec\Exception\EncodingExceptionInterface;
use Lsp\Contracts\Rpc\Message\FailureResponseInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use Lsp\Contracts\Rpc\Message\SuccessfulResponseInterface;
use Lsp\Dispatcher\DispatcherInterface;
use Lsp\Server\ConnectionInterface;
use Lsp\Server\Event\FailureResponseReceived;
use Lsp\Server\Event\FailureResponseSent;
use Lsp\Server\Event\MessageReceived;
use Lsp\Server\Event\MessageSent;
use Lsp\Server\Event\NotificationReceived;
use Lsp\Server\Event\NotificationSent;
use Lsp\Server\Event\RequestReceived;
use Lsp\Server\Event\RequestSent;
use Lsp\Server\Event\ResponseReceived;
use Lsp\Server\Event\ResponseSent;
use Lsp\Server\Event\SuccessfulResponseReceived;
use Lsp\Server\Event\SuccessfulResponseSent;
use Lsp\Server\React\Connection\Buffer;
use Lsp\Server\React\Connection\RequestPool;
use Lsp\Server\React\Server\ReactServer;
use Psr\EventDispatcher\EventDispatcherInterface;
use React\Promise\PromiseInterface;
use React\Socket\ConnectionInterface as SocketConnectionInterface;

/**
 * TODO 1) Add support of promise TTLs for {@see ReactConnection::$requests}
 * TODO 2) Add support of max in-memory promise instances for {@see ReactConnection::$requests}
 *
 * @internal this is an internal library class, please do not use it in your code
 * @psalm-internal Lsp\Server\React
 */
final class ReactConnection implements ConnectionInterface
{
    private readonly Buffer $buffer;

    private readonly RequestPool $requests;

    /**
     * @var non-empty-string|null
     */
    private readonly ?string $address;

    public function __construct(
        private readonly ReactServer $server,
        private readonly SocketConnectionInterface $connection,
        private readonly DecoderInterface $decoder,
        private readonly EncoderInterface $encoder,
        private readonly DispatcherInterface $dispatcher,
        private readonly EventDispatcherInterface $events,
    ) {
        $this->buffer = new Buffer($this->decoder);
        $this->requests = new RequestPool();

        $address = $this->connection->getRemoteAddress();

        $this->address = $address === '' ? null : $address;

        $connection->on('data', function (string $data): void {
            foreach ($this->buffer->push($data) as $message) {
                $this->onMessageReceived($message);
            }
        });
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

    private function beforeMessageSend(MessageInterface $message): void
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

    public function getClientAddress(): string
    {
        return $this->address ?? 'tcp://<unknown>';
    }

    private function onMessageReceived(MessageInterface $message): void
    {
        $this->beforeMessageReceived($message);

        switch (true) {
            case $message instanceof RequestInterface:
                $this->onRequestReceived($message);
                break;

            case $message instanceof NotificationInterface:
                $this->onNotificationReceived($message);
                break;

            case $message instanceof ResponseInterface:
                $this->onReceivedResponse($message);
                break;
        }
    }

    /**
     * @param ResponseInterface<mixed> $response
     */
    private function onReceivedResponse(ResponseInterface $response): void
    {
        $this->requests->resolve($response);
    }

    /**
     * @param RequestInterface<mixed> $request
     */
    private function onRequestReceived(RequestInterface $request): void
    {
        $response = $this->dispatcher->call($request);

        try {
            $this->send($response);
        } catch (EncodingExceptionInterface) {
            // TODO Error: Could not encode response
        }
    }

    private function onNotificationReceived(NotificationInterface $request): void
    {
        $this->dispatcher->notify($request);
    }

    /**
     * @throws EncodingExceptionInterface
     */
    private function send(MessageInterface $message): void
    {
        $this->beforeMessageSend($message);

        $encoded = $this->encoder->encode($message);

        $this->connection->write($encoded);
    }

    public function notify(NotificationInterface $notification): ?\Throwable
    {
        try {
            $this->send($notification);
        } catch (EncodingExceptionInterface) {
            // TODO Error: Could not encode response
        }

        return null;
    }

    /**
     * @throws EncodingExceptionInterface
     */
    public function call(RequestInterface $request): PromiseInterface
    {
        $this->send($request);

        return $this->requests->await($request);
    }

    public function close(): void
    {
        $this->connection->close();
    }

    public function getServer(): ReactServer
    {
        return $this->server;
    }
}
