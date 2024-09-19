<?php

declare(strict_types=1);

namespace Lsp\Dispatcher\HandlerResolver;

use Lsp\Router\Handler\ClassMethodHandler;
use Lsp\Router\Route\MatchedRouteInterface;
use Psr\Container\ContainerInterface;

final class ContainerAwareClassHandlerResolver implements HandlerResolverInterface
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
