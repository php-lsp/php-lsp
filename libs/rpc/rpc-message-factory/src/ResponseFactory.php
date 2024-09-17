<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Factory;

use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;
use Lsp\Contracts\Rpc\Message\FailureResponseInterface;
use Lsp\Contracts\Rpc\Message\IdentifiableInterface;
use Lsp\Contracts\Rpc\Message\IdInterface;
use Lsp\Contracts\Rpc\Message\SuccessfulResponseInterface;
use Lsp\Rpc\Message\FailureResponse;
use Lsp\Rpc\Message\SuccessfulResponse;

final class ResponseFactory implements ResponseFactoryInterface
{
    public function createSuccess(
        IdInterface|IdentifiableInterface $id,
        mixed $result = null,
    ): SuccessfulResponseInterface {
        if ($id instanceof IdentifiableInterface) {
            $id = $id->getId();
        }

        return new SuccessfulResponse($id, $result);
    }

    public function createFailure(
        IdInterface|IdentifiableInterface $id,
        int $code = 0,
        string $message = '',
        mixed $data = null,
    ): FailureResponseInterface {
        if ($id instanceof IdentifiableInterface) {
            $id = $id->getId();
        }

        return new FailureResponse($id, $code, $message, $data);
    }

    /**
     * @template TIdentifier of mixed
     *
     * @param IdInterface<TIdentifier>|IdentifiableInterface<TIdentifier> $id
     *
     * @return FailureResponseInterface<TIdentifier, null>
     */
    public function createFailureFromThrowable(
        IdInterface|IdentifiableInterface $id,
        \Throwable $e,
    ): FailureResponseInterface {
        return $this->createFailure($id, (int) $e->getCode(), $e->getMessage());
    }
}
