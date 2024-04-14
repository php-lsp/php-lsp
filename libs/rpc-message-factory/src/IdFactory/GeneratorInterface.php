<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Factory\IdFactory;

use Lsp\Rpc\Message\Factory\Exception\IdExceptionInterface;
use Lsp\Contracts\Rpc\Message\IdInterface;

/**
 * @template TValue of mixed
 */
interface GeneratorInterface
{
    /**
     * @throws IdExceptionInterface Occurs in case of ID creation errors.
     *
     * @return IdInterface<TValue>
     */
    public function nextId(): IdInterface;
}
