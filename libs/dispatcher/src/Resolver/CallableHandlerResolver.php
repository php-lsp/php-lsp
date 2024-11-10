<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Resolver;

use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Router\Handler\CallableHandler;

final class CallableHandlerResolver implements HandlerResolverInterface
{
    public function resolve(MatchedRouteInterface $route): ?callable
    {
        $handler = $route->getHandler();

        if (!$handler instanceof CallableHandler) {
            return null;
        }

        return $handler->handler;
    }
}
