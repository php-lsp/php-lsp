<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Handler\Resolver;

use Lsp\Contracts\Router\MatchedRouteInterface;

interface HandlerResolverInterface
{
    public function resolve(MatchedRouteInterface $route): ?\Closure;
}
