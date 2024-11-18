<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Handler\Provider;

use Lsp\Contracts\Router\MatchedRouteInterface;

interface HandlerProviderInterface
{
    public function getHandler(MatchedRouteInterface $route): \Closure;
}
