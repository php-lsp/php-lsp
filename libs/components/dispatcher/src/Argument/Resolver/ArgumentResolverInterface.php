<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Argument\Resolver;

use Lsp\Contracts\Router\MatchedRouteInterface;

/**
 * Responsible for resolving the value of an argument
 * based on its reflection information object.
 */
interface ArgumentResolverInterface
{
    /**
     * Returns the possible value(s).
     *
     * @return iterable<array-key, mixed>
     */
    public function resolve(MatchedRouteInterface $route, \ReflectionParameter $parameter): iterable;
}
