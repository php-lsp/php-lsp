<?php

declare(strict_types=1);

namespace Lsp\Contracts\Router;

/**
 * Route object representation.
 */
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
     *
     * Separate services should be used to determine
     * how to invoke this handler.
     */
    public function getHandler(): mixed;
}
