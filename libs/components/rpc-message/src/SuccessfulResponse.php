<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message;

use Lsp\Contracts\Rpc\Message\IdInterface;
use Lsp\Contracts\Rpc\Message\SuccessfulResponseInterface;

/**
 * @template TIdentifier of mixed
 * @template TResult of mixed
 * @template-extends Response<TIdentifier>
 * @template-implements SuccessfulResponseInterface<TIdentifier, TResult>
 */
class SuccessfulResponse extends Response implements SuccessfulResponseInterface
{
    /**
     * @param IdInterface<TIdentifier> $id
     * @param TResult $result
     */
    public function __construct(
        IdInterface $id,
        protected readonly mixed $result = null,
    ) {
        parent::__construct($id);
    }

    public function getResult(): mixed
    {
        return $this->result;
    }
}
