<?php

declare(strict_types=1);

namespace Lsp\Server\React;

use Lsp\Contracts\Rpc\Codec\Exception\EncodingExceptionInterface;
use Lsp\Contracts\Rpc\Message\IdentifiableInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use Lsp\Contracts\Server\ConnectionInterface;
use Lsp\Server\React\Connection\Buffer;
use Lsp\Server\React\Driver\ReactDriverConfiguration;
use React\Promise\Deferred;
use React\Promise\PromiseInterface;
use React\Socket\ConnectionInterface as SocketConnectionInterface;

/**
 * TODO 1) Add support of promise TTLs for {@see ReactConnection::$requests}
 * TODO 2) Add support of max in-memory promise instances for {@see ReactConnection::$requests}
 */
final class ReactConnection implements ConnectionInterface
{
    private readonly Buffer $buffer;

    /**
     * @var array<array-key, Deferred<ResponseInterface<mixed>>>
     */
    private array $requests = [];

    public function __construct(
        private readonly ReactServer $server,
        private readonly ReactDriverConfiguration $config,
        private readonly SocketConnectionInterface $connection,
    ) {
        $this->buffer = new Buffer($this->config->decoder);

        $connection->on('data', function (string $data): void {
            foreach ($this->buffer->push($data) as $message) {
                $this->onReceivedMessage($message);
            }
        });
    }

    private function onReceivedMessage(MessageInterface $message): void
    {
        switch (true) {
            case $message instanceof RequestInterface:
                $this->onReceivedRequest($message);
                break;

            case $message instanceof NotificationInterface:
                $this->onReceivedNotification($message);
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
        $key = $this->getKey($response);

        if ($key === null) {
            // TODO Error: Could not resolve non-array-key ID
            return;
        }

        $deferred = $this->requests[$key] ?? null;

        if ($deferred === null) {
            // TODO Error: Could not find expected deferred
            return;
        }

        unset($this->requests[$key]);

        $deferred->resolve($response);
    }

    /**
     * @param RequestInterface<mixed> $request
     */
    private function onReceivedRequest(RequestInterface $request): void
    {
        $response = $this->config->dispatcher->call($request);

        try {
            $this->send($response);
        } catch (EncodingExceptionInterface) {
            // TODO Error: Could not encode response
        }
    }

    private function onReceivedNotification(NotificationInterface $request): void
    {
        $this->config->dispatcher->notify($request);
    }

    /**
     * @throws EncodingExceptionInterface
     */
    private function send(MessageInterface $message): void
    {
        $encoded = $this->config->encoder->encode($message);

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
     * @template T of mixed
     * @param IdentifiableInterface<T> $ctx
     * @return (T is string ? T :
     *     (T is int ? T : null)
     * )
     */
    private function getKey(IdentifiableInterface $ctx): string|int|null
    {
        $id = $ctx->getId();

        $primitive = $id->toPrimitive();

        if (\is_string($primitive) || \is_int($primitive)) {
            return $primitive;
        }

        return null;
    }

    /**
     * @template TArgIdentifier of mixed
     *
     * @param RequestInterface<TArgIdentifier> $request
     *
     * @return PromiseInterface<ResponseInterface<TArgIdentifier>>
     *
     * @throws EncodingExceptionInterface
     */
    public function call(RequestInterface $request): PromiseInterface
    {
        $this->send($request);

        $deferred = new Deferred();

        $key = $this->getKey($request);

        if ($key !== null) {
            $this->requests[$key] = $deferred;
        } else {
            $deferred->reject(new \InvalidArgumentException(\sprintf(
                'Cannot store request promise for unsupported ID of type %s',
                \get_debug_type($request->getId()),
            )));
        }

        /** @var PromiseInterface<ResponseInterface<TArgIdentifier>> */
        return $deferred->promise();
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
