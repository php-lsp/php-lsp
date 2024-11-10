<?php

declare(strict_types=1);

namespace Lsp\Server\React;

use Lsp\Contracts\Server\ServerInterface;

abstract class ReactServer implements ServerInterface
{
    /**
     * @param non-empty-string $dsn
     */
    public function __construct(
        protected readonly ReactDriver $driver,
        protected readonly string $dsn,
    ) {}

    public function getDriver(): ReactDriver
    {
        return $this->driver;
    }

    public function getDataSourceName(): string
    {
        return $this->dsn;
    }
}
