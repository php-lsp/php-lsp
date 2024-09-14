<?php

declare(strict_types=1);

namespace Lsp\Contracts\Rpc\Message;

/**
 * When RPC call encounters an error, the {@see ResponseInterface} object MUST
 * contain the error member with a value that is an object with the
 * following members:
 *  - code
 *  - message
 *  - data
 *
 * @template TIdentifier of mixed
 * @template TData of mixed
 * @template-extends ResponseInterface<TIdentifier>
 */
interface FailureResponseInterface extends ResponseInterface
{
    /**
     * A {@see int} that indicates the error type that occurred.
     */
    public function getCode(): int;

    /**
     * A {@see string} providing a short description of the error.
     */
    public function getMessage(): string;

    /**
     * A primitive or structured value that contains additional
     * information about the error.
     *
     * @return TData returns variadic error data payload
     */
    public function getData(): mixed;
}
