<?php

declare(strict_types=1);

namespace Lsp\Server\React\Server;

use Lsp\Contracts\Server\ServerInterface;
use Lsp\Server\React\ReactDriver;

/**
 * @internal this is an internal library class, please do not use it in your code
 * @psalm-internal Lsp\Server\React
 */
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
