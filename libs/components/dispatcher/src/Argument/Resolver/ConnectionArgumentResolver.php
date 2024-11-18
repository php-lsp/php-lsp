<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Argument\Resolver;

use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Contracts\Server\ConnectionInterface;
use Lsp\Server\ConnectionProviderInterface;

final class ConnectionArgumentResolver extends ArgumentResolver
{
    public function __construct(
        private readonly ConnectionProviderInterface $provider,
    ) {}

    public function resolve(MatchedRouteInterface $route, \ReflectionParameter $parameter): iterable
    {
        $then = fn(): iterable => yield $this->provider->getConnection(
            message: $route->getRequest(),
        );

        yield from $this->whenType($parameter, ConnectionInterface::class, $then);
    }
}
