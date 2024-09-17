<?php

declare(strict_types=1);

namespace Lsp\Router\Route;

use Lsp\Router\Handler\HandlerInterface;

final class Route implements RouteInterface
{
    public function __construct(
        /**
         * @var non-empty-string
         */
        private readonly string $method,
        private readonly HandlerInterface $handler,
    ) {}

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getHandler(): HandlerInterface
    {
        return $this->handler;
    }
}
