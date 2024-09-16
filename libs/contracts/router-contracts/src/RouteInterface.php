<?php

declare(strict_types=1);

namespace Lsp\Contracts\Router;

use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;

/**
 * @phpstan-type RouteProcedureHandlerType \Closure(NotificationInterface):void
 * @phpstan-type RouteMethodHandlerType \Closure(RequestInterface<mixed>):ResponseInterface<mixed>
 * @phpstan-type RouteHandlerType (RouteProcedureHandlerType | RouteMethodHandlerType)
 *
 * @psalm-type RouteProcedureHandlerType = \Closure(NotificationInterface):void
 * @psalm-type RouteMethodHandlerType = \Closure(RequestInterface<mixed>):ResponseInterface<mixed>
 * @psalm-type RouteHandlerType = (RouteProcedureHandlerType | RouteMethodHandlerType)
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
     * @phpstan-return RouteHandlerType
     *
     * @psalm-return RouteHandlerType
     */
    public function getHandler(): \Closure;
}
