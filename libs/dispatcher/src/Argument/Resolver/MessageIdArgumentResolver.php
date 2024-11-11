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
        $then = static function () use ($route): iterable {
            $request = $route->getRequest();

            if ($request instanceof IdentifiableInterface) {
                yield $request->getId();
            }
        };

        yield from $this->whenType($parameter, IdInterface::class, $then);
    }
}
