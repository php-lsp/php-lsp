<?php

declare(strict_types=1);

namespace Lsp\Server\React;

use Lsp\Contracts\Rpc\Codec\Exception\EncodingExceptionInterface;
use Lsp\Contracts\Rpc\Message\FailureResponseInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use Lsp\Contracts\Rpc\Message\SuccessfulResponseInterface;
use Lsp\Server\Address\AddressInterface;
use Lsp\Server\EstablishedClient;
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
use Lsp\Server\ListenedServerInterface;
use Lsp\Server\React\Connection\Buffer;
use Lsp\Server\React\Connection\RequestPool;
use React\Promise\PromiseInterface;
use React\Socket\ConnectionInterface as SocketInterface;

/**
 * TODO 1) Add support of promise TTLs for {@see ReactEstablishedClient::$requests}
 * TODO 2) Add support of max in-memory promise instances for {@see ReactEstablishedClient::$requests}
 */
final class ReactEstablishedClient extends EstablishedClient
{
    private readonly Buffer $buffer;

    private readonly RequestPool $requests;

    public function __construct(
        private readonly SocketInterface $connection,
        private readonly ReactServerConfiguration $config,
        ListenedServerInterface $server,
        AddressInterface $address,
    ) {
        $this->buffer = new Buffer($config->decoder);
        $this->requests = new RequestPool();

        parent::__construct($server, $address);

        $this->listen($this->connection);
    }

    private function listen(SocketInterface $connection): void
    {
        $connection->on('data', function (string $data): void {
            foreach ($this->buffer->push($data) as $message) {
                $this->onMessageReceived($message);
            }
        });
    }

    private function beforeMessageReceived(MessageInterface $message): void
    {
        $this->config->events->dispatch(new MessageReceived(
            message: $message,
            connection: $this,
        ));

        if ($message instanceof NotificationInterface) {
            $this->config->events->dispatch(new NotificationReceived(
                notification: $message,
                connection: $this,
            ));

            if ($message instanceof RequestInterface) {
                $this->config->events->dispatch(new RequestReceived(
                    request: $message,
                    connection: $this,
                ));
            }

            return;
        }

        if ($message instanceof ResponseInterface) {
            $this->config->events->dispatch(new ResponseReceived(
                response: $message,
                connection: $this,
            ));

            if ($message instanceof SuccessfulResponseInterface) {
                $this->config->events->dispatch(new SuccessfulResponseReceived(
                    response: $message,
                    connection: $this,
                ));
            } elseif ($message instanceof FailureResponseInterface) {
                $this->config->events->dispatch(new FailureResponseReceived(
                    response: $message,
                    connection: $this,
                ));
            }
        }
    }

    private function beforeMessageSend(MessageInterface $message): void
    {
        $this->config->events->dispatch(new MessageSent(
            message: $message,
            connection: $this,
        ));

        if ($message instanceof NotificationInterface) {
            $this->config->events->dispatch(new NotificationSent(
                notification: $message,
                connection: $this,
            ));

            if ($message instanceof RequestInterface) {
                $this->config->events->dispatch(new RequestSent(
                    request: $message,
                    connection: $this,
                ));
            }

            return;
        }

        if ($message instanceof ResponseInterface) {
            $this->config->events->dispatch(new ResponseSent(
                response: $message,
                connection: $this,
            ));

            if ($message instanceof SuccessfulResponseInterface) {
                $this->config->events->dispatch(new SuccessfulResponseSent(
                    response: $message,
                    connection: $this,
                ));
            } elseif ($message instanceof FailureResponseInterface) {
                $this->config->events->dispatch(new FailureResponseSent(
                    response: $message,
                    connection: $this,
                ));
            }
        }
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
                $this->onResponseReceived($message);
                break;
        }
    }

    /**
     * @param ResponseInterface<mixed> $response
     */
    private function onResponseReceived(ResponseInterface $response): void
    {
        $this->requests->resolve($response);
    }

    /**
     * @param RequestInterface<mixed> $request
     */
    private function onRequestReceived(RequestInterface $request): void
    {
        $response = $this->config->dispatcher->call($request);

        try {
            $this->send($response);
        } catch (EncodingExceptionInterface) {
            // TODO Error: Could not encode response
        }
    }

    private function onNotificationReceived(NotificationInterface $request): void
    {
        $this->config->dispatcher->notify($request);
    }

    protected function onClose(): void
    {
        $this->connection->close();
    }

    /**
     * @throws EncodingExceptionInterface
     */
    private function send(MessageInterface $message): void
    {
        $this->beforeMessageSend($message);

        $encoded = $this->config->encoder->encode($message);

        $this->write($encoded, [
            'Content-Length' => \strlen($encoded),
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

        $this->connection->write($message);
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
}
