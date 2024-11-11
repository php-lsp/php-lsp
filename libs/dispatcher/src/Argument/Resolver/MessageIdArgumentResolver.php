<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Argument\Resolver;

use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Contracts\Rpc\Message\IdentifiableInterface;
use Lsp\Contracts\Rpc\Message\IdInterface;

final class MessageIdArgumentResolver extends ArgumentResolver
{
    public function resolve(MatchedRouteInterface $route, \ReflectionParameter $parameter): iterable
    {
        yield from $this->whenType(
            parameter: $parameter,
            type: IdInterface::class,
            then: static function () use ($route): iterable {
                $request = $route->getRequest();

                if ($request instanceof IdentifiableInterface) {
                    yield $request->getId();
                }
            },
        );
    }
}
