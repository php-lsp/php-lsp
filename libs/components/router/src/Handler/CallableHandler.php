<?php

declare(strict_types=1);

namespace Lsp\Router\Handler;

final class CallableHandler
{
    public readonly \Closure $handler;

    public function __construct(callable $handler)
    {
        $this->handler = $handler(...);
    }
}
