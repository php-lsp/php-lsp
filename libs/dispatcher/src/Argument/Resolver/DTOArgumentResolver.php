<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Argument\Resolver;

use Lsp\Contracts\Hydrator\HydratorInterface;
use Lsp\Contracts\Router\MatchedRouteInterface;

final class DTOArgumentResolver extends ArgumentResolver
{
    private const TYPES_NAMESPACE = 'Lsp\Protocol\Type';

    public function __construct(
        private readonly HydratorInterface $hydrator,
    ) {}

    private static function matchType(string $type): bool
    {
        return \str_starts_with(\ltrim($type, '\\'), self::TYPES_NAMESPACE);
    }

    public function resolve(MatchedRouteInterface $route, \ReflectionParameter $parameter): iterable
    {
        $type = $this->fetchTypeName($parameter);

        if ($type === null || !self::matchType($type)) {
            return;
        }

        $request = $route->getRequest();

        yield $this->hydrator->hydrate($type, $request->getParameters());
    }
}
