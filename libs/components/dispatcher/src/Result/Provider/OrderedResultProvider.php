<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Result\Provider;

use Lsp\Dispatcher\Result\Resolver\ResultResolverInterface;

final class OrderedResultProvider implements ResultProviderInterface
{
    /**
     * @var list<ResultResolverInterface>
     */
    private readonly array $resolvers;

    /**
     * @param iterable<array-key, ResultResolverInterface> $resolvers
     */
    public function __construct(iterable $resolvers = [])
    {
        $this->resolvers = self::iterableToList($resolvers);
    }

    /**
     * @param iterable<array-key, ResultResolverInterface> $resolvers
     *
     * @return list<ResultResolverInterface>
     */
    private static function iterableToList(iterable $resolvers): array
    {
        return match (true) {
            $resolvers instanceof \Traversable => \iterator_to_array($resolvers, false),
            \array_is_list($resolvers) => $resolvers,
            default => \array_values($resolvers),
        };
    }

    public function getResult(mixed $value): mixed
    {
        foreach ($this->resolvers as $resolver) {
            if ($resolver->supports($value)) {
                return $resolver->resolve($value);
            }
        }

        return $value;
    }
}
