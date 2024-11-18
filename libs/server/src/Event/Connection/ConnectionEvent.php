<?php

declare(strict_types=1);

namespace Lsp\Server\Event\Connection;

use Lsp\Server\ConnectionInterface;

abstract class ConnectionEvent
{
    public function __construct(
        public readonly ConnectionInterface $connection,
    ) {}
}
