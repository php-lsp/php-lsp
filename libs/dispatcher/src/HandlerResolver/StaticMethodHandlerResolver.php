<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\HandlerResolver;

use Lsp\Router\Handler\StaticMethodHandler;
use Lsp\Router\Route\MatchedRouteInterface;

final class StaticMethodHandlerResolver implements HandlerResolverInterface
{
    public function resolve(MatchedRouteInterface $route): ?callable
    {
        $handler = $route->getHandler();

        if (!$handler instanceof StaticMethodHandler) {
            return null;
        }

        $instance = $handler->class;
        $method = $handler->method;

        // @phpstan-ignore-next-line
        return $instance::$method(...);
    }
}
