<?php

declare(strict_types=1);

namespace Lsp\Server\Connection;

use Lsp\Contracts\Rpc\Message\IdentifiableInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use React\Promise\Deferred;
use React\Promise\PromiseInterface;

/**
 * TODO 1) Add support of promise TTLs for {@see PendingResponsePool::$requests}
 * TODO 2) Add support of max in-memory promise instances for {@see PendingResponsePool::$requests}
 *
 * @internal this is an internal library class, please do not use it in your code
 * @psalm-internal Lsp\Server\Connection
 */
final class PendingResponsePool
{
    /**
     * @var array<array-key, Deferred<ResponseInterface<mixed>>>
     */
    private array $requests = [];

    /**
     * @param ResponseInterface<mixed> $response
     */
    public function resolve(ResponseInterface $response): void
    {
        $key = $this->getKey($response);

        if ($key === null) {
            throw new \OutOfRangeException('Response contains unsupported RPC ID');
        }

        $deferred = $this->requests[$key] ?? null;

        if ($deferred === null) {
            throw new \OutOfRangeException('There is no request with the specified ID for the received response');
        }

        unset($this->requests[$key]);

        $deferred->resolve($response);
    }

    /**
     * @template TArgIdentifier of mixed
     *
     * @param RequestInterface<TArgIdentifier> $request
     *
     * @return PromiseInterface<ResponseInterface<TArgIdentifier>>
     */
    public function await(RequestInterface $request): PromiseInterface
    {
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

    /**
     * @template T of mixed
     *
     * @param IdentifiableInterface<T> $ctx
     *
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
}
