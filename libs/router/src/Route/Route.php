<?php

declare(strict_types=1);

namespace Lsp\Router\Route;

use Lsp\Contracts\Router\RouteInterface;

final class Route implements RouteInterface
{
    public function __construct(
        /**
         * @var non-empty-string
         */
        private readonly string $method,
        private readonly mixed $handler,
    ) {}

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getHandler(): mixed
    {
        return $this->handler;
    }
}
