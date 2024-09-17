<?php

declare(strict_types=1);

namespace Lsp\Router\Handler;

class InstanceMethodHandler implements HandlerInterface
{
    /**
     * @param non-empty-string $method
     */
    public function __construct(
        public readonly object $object,
        public readonly string $method,
    ) {}
}
