<?php

declare(strict_types=1);

namespace Lsp\Server\Driver;

use Lsp\Server\Address\AddressInterface;

interface ServerDriverInterface
{
    public function getAddress(): AddressInterface;

    /**
     * @param \Closure(ConnectionDriverInterface):void $then
     */
    public function onEstablished(\Closure $then): void;

    public function close(): void;
}
