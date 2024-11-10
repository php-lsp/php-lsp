<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Provider;

use Lsp\Contracts\Router\MatchedRouteInterface;

interface HandlerProviderInterface
{
    public function getHandler(MatchedRouteInterface $route): callable;
}
