<?php

declare(strict_types=1);

namespace Lsp\Server\Event\Server;

use Lsp\Server\ServerInterface;

abstract class ServerEvent
{
    public function __construct(
        public readonly ServerInterface $server,
    ) {}
}
