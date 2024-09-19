<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\HandlerResolver;

use Lsp\Router\Route\MatchedRouteInterface;

interface HandlerResolverInterface
{
    public function resolve(MatchedRouteInterface $route): ?callable;
}
