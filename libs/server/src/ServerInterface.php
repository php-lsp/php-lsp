<?php

declare(strict_types=1);

namespace Lsp\Server;

interface ServerInterface
{
    /**
     * Forces the application to stop running.
     */
    public function stop(): void;
}
