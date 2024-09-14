<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message;

use Lsp\Contracts\Rpc\Message\IdInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;

/**
 * @template TIdentifier of mixed
 * @template-implements ResponseInterface<TIdentifier>
 */
abstract class Response implements ResponseInterface
{
    /**
     * @param IdInterface<TIdentifier> $id
     */
    public function __construct(
        protected IdInterface $id,
    ) {}

    public function getId(): IdInterface
    {
        return $this->id;
    }

    /**
     * Returns {@see true} in case of current Response instance matches
     * passed Request instance or {@see false} instead.
     *
     * @param RequestInterface<mixed> $request
     */
    public function matchesRequest(RequestInterface $request): bool
    {
        return $this->id->equals($request->getId());
    }
}
