<?php

declare(strict_types=1);

namespace Lsp\Router\Handler\Resolver;

use Lsp\Router\Route\MatchedRouteInterface;

interface HandlerResolverInterface
{
    public function resolve(MatchedRouteInterface $route): ?callable;
}
