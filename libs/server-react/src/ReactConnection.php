<?php

declare(strict_types=1);

namespace Lsp\Server\React;

use Lsp\Contracts\Dispatcher\DispatcherInterface;
use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Contracts\Rpc\Codec\Exception\EncodingExceptionInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use Lsp\Contracts\Server\ConnectionInterface;
use Lsp\Server\React\Connection\Buffer;
use Lsp\Server\React\Connection\RequestPool;
use Lsp\Server\React\Server\ReactServer;
use React\Promise\PromiseInterface;
use React\Socket\ConnectionInterface as SocketConnectionInterface;

/**
 * TODO 1) Add support of promise TTLs for {@see ReactConnection::$requests}
 * TODO 2) Add support of max in-memory promise instances for {@see ReactConnection::$requests}
 *
 * @internal this is an internal library class, please do not use it in your code.
 * @psalm-internal Lsp\Server\React
 */
final class ReactConnection implements ConnectionInterface
{
    private readonly Buffer $buffer;

    private readonly RequestPool $requests;

    public function __construct(
        private readonly ReactServer $server,
        private readonly SocketConnectionInterface $connection,
        private readonly DecoderInterface $decoder,
        private readonly EncoderInterface $encoder,
        private readonly DispatcherInterface $dispatcher,
    ) {
        $this->buffer = new Buffer($this->decoder);
        $this->requests = new RequestPool();

        $connection->on('data', function (string $data): void {
            foreach ($this->buffer->push($data) as $message) {
                $this->onMessageReceived($message);
            }
        });
    }

    private function beforeMessageReceived(MessageInterface $message): void
    {
        dump('>', $message);
        // TODO
    }

    private function beforeMessageSend(MessageInterface $message): void
    {
        dump('<', $message);
        // TODO
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
