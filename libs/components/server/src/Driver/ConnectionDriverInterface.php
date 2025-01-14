<?php

declare(strict_types=1);

namespace Lsp\Server\Driver;

use Lsp\Contracts\Server\AddressInterface;

interface ConnectionDriverInterface
{
    public function getAddress(): AddressInterface;

    public function write(string $data): void;

    /**
     * @param \Closure(string):void $then
     */
    public function onData(\Closure $then): void;

    /**
     * @param \Closure(\Throwable):void $then
     */
    public function onError(\Closure $then): void;

    /**
     * @param \Closure():void $then
     */
    public function onClose(\Closure $then): void;

    public function close(): void;
}
