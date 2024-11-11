<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Handler\Resolver;

use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Router\Handler\FunctionHandler;

final class FunctionHandlerResolver implements HandlerResolverInterface
{
    public function resolve(MatchedRouteInterface $route): ?\Closure
    {
        $handler = $route->getHandler();

        if (!$handler instanceof FunctionHandler) {
            return null;
        }

        return ($handler->function)(...);
    }
}
