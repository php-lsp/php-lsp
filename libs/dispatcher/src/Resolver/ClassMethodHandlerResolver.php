<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Resolver;

use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Router\Handler\InstanceMethodHandler;

final class ClassMethodHandlerResolver implements HandlerResolverInterface
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
