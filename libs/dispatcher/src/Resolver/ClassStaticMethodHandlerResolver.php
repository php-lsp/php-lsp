<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Resolver;

use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Router\Handler\ClassStaticMethodHandler;

final class ClassStaticMethodHandlerResolver implements HandlerResolverInterface
{
    public function resolve(MatchedRouteInterface $route): ?callable
    {
        $handler = $route->getHandler();

        if (!$handler instanceof ClassStaticMethodHandler) {
            return null;
        }

        $instance = $handler->class;
        $method = $handler->method;

        // @phpstan-ignore-next-line
        return $instance::$method(...);
    }
}
