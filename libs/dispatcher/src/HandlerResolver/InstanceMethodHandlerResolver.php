<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\HandlerResolver;

use Lsp\Router\Handler\InstanceMethodHandler;
use Lsp\Router\Route\MatchedRouteInterface;

final class InstanceMethodHandlerResolver implements HandlerResolverInterface
{
    public function resolve(MatchedRouteInterface $route): ?callable
    {
        $handler = $route->getHandler();

        if (!$handler instanceof InstanceMethodHandler) {
            return null;
        }

        $instance = $handler->object;
        $method = $handler->method;

        // @phpstan-ignore-next-line
        return $instance->$method(...);
    }
}
