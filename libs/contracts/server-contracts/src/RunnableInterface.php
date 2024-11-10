<?php

declare(strict_types=1);

namespace Lsp\Contracts\Server;

interface RunnableInterface
{
    public function run(): void;

    public function stop(): void;
}
