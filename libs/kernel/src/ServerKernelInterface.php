<?php

declare(strict_types=1);

namespace Lsp\Kernel;

interface ServerKernelInterface extends KernelInterface
{
    /**
     * @param non-empty-string $host
     * @param int<0, 65535> $port
     */
    public function run(int $port = 0, string $host = '127.0.0.1'): void;
}
