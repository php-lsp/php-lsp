<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Provider;

use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Dispatcher\Resolver\CallableHandlerResolver;
use Lsp\Dispatcher\Resolver\ClassMethodHandlerResolver;
use Lsp\Dispatcher\Resolver\ClassStaticMethodHandlerResolver;
use Lsp\Dispatcher\Resolver\FunctionHandlerResolver;
use Lsp\Dispatcher\Resolver\HandlerResolverInterface;

final class SelectableHandlerProvider implements HandlerProviderInterface
{
    /**
     * @var list<HandlerResolverInterface>
     */
    private readonly array $resolvers;

    /**
     * @param iterable<array-key, HandlerResolverInterface> $resolvers
     */
    public function __construct(iterable $resolvers)
    {
        $this->resolvers = self::iterableToList($resolvers);
    }

    /**
     * @param iterable<array-key, HandlerResolverInterface> $resolvers
     * @return list<HandlerResolverInterface>
     */
    private static function iterableToList(iterable $resolvers): array
    {
        return match (true) {
            $resolvers instanceof \Traversable => \iterator_to_array($resolvers, false),
            \array_is_list($resolvers) => $resolvers,
            default => \array_values($resolvers),
        };
    }

    public function getHandler(MatchedRouteInterface $route): callable
    {
        foreach ($this->resolvers as $resolver) {
            $result = $resolver->resolve($route);

            if ($result !== null) {
                return $result;
            }
        }

        $handler = $route->getHandler();

        throw new \InvalidArgumentException(\sprintf(
            'There is no resolver to convert handler %s for route "%s" to a function',
            $handler instanceof \Stringable ? $handler : \get_debug_type($handler),
            $route->getMethod(),
        ));
    }
}
