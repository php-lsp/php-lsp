<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Argument\Resolver;

use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Contracts\Router\RouteInterface;

final class RouteArgumentResolver extends ArgumentResolver
{
    public function resolve(MatchedRouteInterface $route, \ReflectionParameter $parameter): iterable
    {
        yield from $this->whenType($parameter, RouteInterface::class, static fn(): iterable
            => yield $route,
        );
    }
}
