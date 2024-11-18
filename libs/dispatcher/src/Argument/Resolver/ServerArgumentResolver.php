<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Argument\Resolver;

use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Contracts\Server\ServerInterface;
use Lsp\Server\ConnectionProviderInterface;

final class ServerArgumentResolver extends ArgumentResolver
{
    public function __construct(
        private readonly ConnectionProviderInterface $provider,
    ) {}

    public function resolve(MatchedRouteInterface $route, \ReflectionParameter $parameter): iterable
    {
        $then = fn(): iterable => yield $this->provider->getConnection(
            message: $route->getRequest(),
        )?->getServer();

        yield from $this->whenType($parameter, ServerInterface::class, $then);
    }
}
