<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message;

use Lsp\Contracts\Rpc\Message\FailureResponseInterface;
use Lsp\Contracts\Rpc\Message\IdInterface;

/**
 * @template TIdentifier of mixed
 * @template TData of mixed
 * @template-extends Response<TIdentifier>
 * @template-implements FailureResponseInterface<TIdentifier, TData>
 */
class FailureResponse extends Response implements FailureResponseInterface
{
    /**
     * @param IdInterface<TIdentifier> $id
     * @param TData $data
     */
    public function __construct(
        IdInterface $id,
        protected readonly int $code = 0,
        protected readonly string $message = '',
        protected readonly mixed $data = null,
    ) {
        parent::__construct($id);
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getData(): mixed
    {
        return $this->data;
    }
}
