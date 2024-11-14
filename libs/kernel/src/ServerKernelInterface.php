<?php

declare(strict_types=1);

namespace Lsp\Kernel;

interface ServerKernelInterface extends KernelInterface
{
    /**
     * @param non-empty-string $dsn
     */
    public function listen(string $dsn): void;
}
