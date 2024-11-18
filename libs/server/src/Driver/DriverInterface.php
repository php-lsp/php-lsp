<?php

declare(strict_types=1);

namespace Lsp\Server\Driver;

interface DriverInterface
{
    public function create(string|\Stringable $dsn): ServerDriverInterface;

    public function stop(): void;
}
