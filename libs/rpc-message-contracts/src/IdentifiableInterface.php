<?php

declare(strict_types=1);

namespace Lsp\Contracts\Rpc\Message;

/**
 * @template TIdentifier of mixed
 */
interface IdentifiableInterface
{
    /**
     * Returns an unique {@see IdInterface} value object representation of
     * the message identifier.
     *
     * @return IdInterface<TIdentifier>
     */
    public function getId(): IdInterface;
}
