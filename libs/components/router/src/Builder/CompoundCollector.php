<?php

declare(strict_types=1);

namespace Lsp\Router\Builder;

use Lsp\Contracts\Router\RouteInterface;
use Lsp\Contracts\Router\RouterInterface;
use Lsp\Router\CompoundRouter;
use Lsp\Router\Router;

/**
 * @template-implements \IteratorAggregate<array-key, RouteInterface>
 */
final class CompoundCollector implements BuilderInterface, \IteratorAggregate
{
    /**
     * @var list<BuilderInterface>
     */
    private readonly array $builders;

    /**
     * @param iterable<array-key, BuilderInterface> $builders
     */
    public function __construct(iterable $builders)
    {
        $this->builders = match (true) {
            $builders instanceof \Traversable => \iterator_to_array($builders, false),
            \array_is_list($builders) => $builders,
            default => \array_values($builders),
        };
    }

    /**
     * @return list<RouterInterface>
     */
    private function buildAll(): array
    {
        $result = [];

        foreach ($this->builders as $builder) {
            if ($builder->count() > 0) {
                $result[] = $builder->build();
            }
        }

        return $result;
    }

    public function build(): RouterInterface
    {
        $routers = $this->buildAll();

        return match (\count($routers)) {
            0 => new Router(),
            1 => $routers[0],
            default => new CompoundRouter($routers),
        };
    }

    public function getIterator(): \Traversable
    {
        foreach ($this->builders as $builder) {
            yield from $builder;
        }
    }

    public function count(): int
    {
        $result = 0;

        foreach ($this->builders as $builder) {
            $result += $builder->count();
        }

        return $result;
    }
}
