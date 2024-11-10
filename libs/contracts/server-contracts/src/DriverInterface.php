<?php

declare(strict_types=1);

namespace Lsp\Contracts\Server;

interface DriverInterface extends RunnableInterface
{
    /**
     * @param non-empty-string $dsn
     */
    public function create(string $dsn): ServerInterface;
}
