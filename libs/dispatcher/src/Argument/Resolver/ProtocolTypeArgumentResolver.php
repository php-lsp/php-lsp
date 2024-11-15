<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Argument\Resolver;

use Lsp\Contracts\Hydrator\HydratorInterface;
use Lsp\Contracts\Router\MatchedRouteInterface;

final class ProtocolTypeArgumentResolver extends ArgumentResolver
{
    private const PROTOCOL_TYPE_NAMESPACE = 'Lsp\Protocol\Type\\';

    public function __construct(
        private readonly HydratorInterface $hydrator,
    ) {}

    public function resolve(MatchedRouteInterface $route, \ReflectionParameter $parameter): iterable
    {
        $type = $this->fetchTypeName($parameter);

        if ($type === null || !\str_starts_with($type, self::PROTOCOL_TYPE_NAMESPACE)) {
            return;
        }

        $request = $route->getRequest();

        yield $this->hydrator->hydrate($type, $request->getParameters());
    }
}
