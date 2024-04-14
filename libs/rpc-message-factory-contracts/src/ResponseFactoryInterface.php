<?php

declare(strict_types=1);

namespace Lsp\Contracts\Rpc\Message\Factory;

use Lsp\Contracts\Rpc\Message\FailureResponseInterface;
use Lsp\Contracts\Rpc\Message\IdentifiableInterface;
use Lsp\Contracts\Rpc\Message\IdInterface;
use Lsp\Contracts\Rpc\Message\SuccessfulResponseInterface;

interface ResponseFactoryInterface
{
    /**
     * Returns successful response instance from ID (or ID provider) and payload.
     *
     * @template TIdentifier of mixed
     * @template TResult of mixed
     *
     * @param IdInterface<TIdentifier>|IdentifiableInterface<TIdentifier> $id
     * @param TResult $result
     *
     * @return SuccessfulResponseInterface<TIdentifier, TResult>
     */
    public function createSuccess(
        IdInterface|IdentifiableInterface $id,
        mixed $result = null,
    ): SuccessfulResponseInterface;

    /**
     * Returns failure response instance from ID (or ID provider) and error
     * payload (code + message + arbitrary optional data).
     *
     * @template TIdentifier of mixed
     * @template TData of mixed
     *
     * @param IdInterface<TIdentifier>|IdentifiableInterface<TIdentifier> $id
     * @param TData $data
     *
     * @return FailureResponseInterface<TIdentifier, TData>
     */
    public function createFailure(
        IdInterface|IdentifiableInterface $id,
        int $code = 0,
        string $message = '',
        mixed $data = null,
    ): FailureResponseInterface;
}
