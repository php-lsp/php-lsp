<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Argument\Resolver;

use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Contracts\Rpc\Message\MessageInterface;

final class MessageArgumentResolver extends ArgumentResolver
{
    public function resolve(MatchedRouteInterface $route, \ReflectionParameter $parameter): iterable
    {
        yield from $this->whenType(
            $parameter,
            MessageInterface::class,
            static fn(): iterable
            => yield $route->getRequest(),
        );
    }
}
