<?php

declare(strict_types=1);

namespace Lsp\Router\Route;

use Lsp\Router\Handler\HandlerInterface;

interface RouteInterface
{
    /**
     * Returns an expected RPC route method.
     *
     * @return non-empty-string
     */
    public function getMethod(): string;

    /**
     * Returns handler for the given route.
     */
    public function getHandler(): HandlerInterface;
}
