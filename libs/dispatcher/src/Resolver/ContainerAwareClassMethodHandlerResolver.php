<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\Resolver;

use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Router\Handler\ClassMethodHandler;
use Psr\Container\ContainerInterface;

final class ContainerAwareClassMethodHandlerResolver implements HandlerResolverInterface
{
    public function __construct(
        private readonly ContainerInterface $container,
        private readonly bool $checkForExistence = true,
    ) {}

    public function resolve(MatchedRouteInterface $route): ?callable
    {
        $handler = $route->getHandler();

        if (!$handler instanceof ClassMethodHandler) {
            return null;
        }

        if ($this->checkForExistence && !$this->container->has($handler->class)) {
            return null;
        }

        $instance = $this->container->get($handler->class);
        $method = $handler->method;

        // @phpstan-ignore-next-line
        return $instance->$method(...);
    }
}
