<?php

declare(strict_types=1);

namespace Lsp\Server;

interface DriverInterface extends RunnableInterface
{
    /**
     * @param non-empty-string $dsn
     */
    public function create(string $dsn): ServerInterface;
}
