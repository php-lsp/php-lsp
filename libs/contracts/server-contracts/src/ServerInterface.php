<?php

declare(strict_types=1);

namespace Lsp\Contracts\Server;

interface ServerInterface
{
    /**
     * Returns the driver instance for this server.
     */
    public function getDriver(): DriverInterface;

    /**
     * Returns the name of the data source that this server is connected to.
     *
     * @return non-empty-string
     */
    public function getDataSourceName(): string;
}
