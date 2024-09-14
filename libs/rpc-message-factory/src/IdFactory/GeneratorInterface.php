<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Factory\IdFactory;

use Lsp\Contracts\Rpc\Message\IdInterface;
use Lsp\Rpc\Message\Factory\Exception\IdExceptionInterface;

/**
 * @template TValue of mixed
 */
interface GeneratorInterface
{
    /**
     * @return IdInterface<TValue>
     * @throws IdExceptionInterface occurs in case of ID creation errors
     */
    public function nextId(): IdInterface;
}
