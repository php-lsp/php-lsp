<?php

declare(strict_types=1);

namespace Lsp\Kernel;

interface ServerKernelInterface extends KernelInterface
{
    /**
     * @param non-empty-string $host
     * @param int<0, 65535> $port
     */
    public function run(string $host, int $port): void;
}
