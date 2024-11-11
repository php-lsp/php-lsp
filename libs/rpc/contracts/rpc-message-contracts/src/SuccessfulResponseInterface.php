<?php

declare(strict_types=1);

namespace Lsp\Contracts\Rpc\Message;

/**
 * @template-covariant TIdentifier of mixed
 * @template-covariant TResult of mixed
 *
 * @template-extends ResponseInterface<TIdentifier>
 */
interface SuccessfulResponseInterface extends ResponseInterface
{
    /**
     * @return TResult
     */
    public function getResult(): mixed;
}
