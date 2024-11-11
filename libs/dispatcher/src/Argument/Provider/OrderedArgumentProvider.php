<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Argument\Provider;

use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Dispatcher\Argument\Resolver\ArgumentResolverInterface;

final class OrderedArgumentProvider implements ArgumentProviderInterface
{
    /**
     * @var list<ArgumentResolverInterface>
     */
    private readonly array $resolvers;

    /**
     * @param iterable<array-key, ArgumentResolverInterface> $resolvers
     */
    public function __construct(iterable $resolvers)
    {
        $this->resolvers = self::iterableToList($resolvers);
    }

    /**
     * @param iterable<array-key, ArgumentResolverInterface> $resolvers
     *
     * @return list<ArgumentResolverInterface>
     */
    private static function iterableToList(iterable $resolvers): array
    {
        return match (true) {
            $resolvers instanceof \Traversable => \iterator_to_array($resolvers, false),
            \array_is_list($resolvers) => $resolvers,
            default => \array_values($resolvers),
        };
    }

    public function getAllArguments(MatchedRouteInterface $route, \Closure $handler): iterable
    {
        $reflection = new \ReflectionFunction($handler);

        foreach ($reflection->getParameters() as $parameter) {
            $resolved = false;

            foreach ($this->resolvers as $resolver) {
                foreach ($resolver->resolve($route, $parameter) as $argument) {
                    $resolved = true;
                    yield $argument;
                }

                if ($resolved) {
                    break;
                }
            }

            if ($resolved === false) {
                throw new \InvalidArgumentException(\sprintf(
                    'Could not resolve argument $%s for method %s',
                    $parameter->getName(),
                    $reflection->getName(),
                ));
            }
        }
    }
}
