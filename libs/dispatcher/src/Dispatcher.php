<?php

declare(strict_types=1);

namespace Lsp\Dispatcher;

use Lsp\Contracts\Dispatcher\DispatcherInterface;
use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Contracts\Router\RouterInterface;
use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;
use Lsp\Contracts\Rpc\Message\FailureResponseInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use Lsp\Dispatcher\Resolver\CallableHandlerResolver;
use Lsp\Dispatcher\Resolver\ClassMethodHandlerResolver;
use Lsp\Dispatcher\Resolver\ClassStaticMethodHandlerResolver;
use Lsp\Dispatcher\Resolver\FunctionHandlerResolver;
use Lsp\Dispatcher\Resolver\HandlerResolverInterface;

final class Dispatcher implements DispatcherInterface
{
    /**
     * @var array<non-empty-string, HandlerResolverInterface>
     */
    private array $optimizedResolvers = [];

    /**
     * @param iterable<array-key, HandlerResolverInterface> $resolvers
     */
    public function __construct(
        private readonly RouterInterface $router,
        private readonly ResponseFactoryInterface $responses,
        private readonly iterable $resolvers = [
            new CallableHandlerResolver(),
            new ClassMethodHandlerResolver(),
            new ClassStaticMethodHandlerResolver(),
            new FunctionHandlerResolver(),
        ],
    ) {}

    private function getOptimizedHandler(MatchedRouteInterface $route): ?callable
    {
        $method = $route->getMethod();

        if (!isset($this->optimizedResolvers[$method])) {
            return null;
        }

        return $this->optimizedResolvers[$method]->resolve($route);
    }

    private function optimizeHandlerResolver(MatchedRouteInterface $route, HandlerResolverInterface $resolver): void
    {
        $this->optimizedResolvers[$route->getMethod()] = $resolver;
    }

    protected function getHandler(MatchedRouteInterface $route): callable
    {
        // Resolver priority sampling optimization
        if (($result = $this->getOptimizedHandler($route)) !== null) {
            return $result;
        }

        foreach ($this->resolvers as $resolver) {
            $result = $resolver->resolve($route);

            if ($result !== null) {
                $this->optimizeHandlerResolver($route, $resolver);

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

    public function notify(NotificationInterface $notification): ?\Throwable
    {
        try {
            $route = $this->router->matchOrFail($notification);

            $this->dispatch($route);
        } catch (\Throwable $e) {
            return $e;
        }

        return null;
    }

    public function call(RequestInterface $request): ResponseInterface
    {
        try {
            $route = $this->router->matchOrFail($request);

            $result = $this->dispatch($route);
        } catch (\Throwable $e) {
            return $this->createFailureResponseForRequest($request, $e);
        }

        return $this->responses->createSuccess($request, $result);
    }

    /**
     * @template TArgIdentifier of mixed
     * @template TArgException of \Throwable
     *
     * @param RequestInterface<TArgIdentifier> $request
     * @param TArgException $e
     *
     * @return FailureResponseInterface<TArgIdentifier, TArgException>
     */
    private function createFailureResponseForRequest(RequestInterface $request, \Throwable $e): FailureResponseInterface
    {
        return $this->responses->createFailure(
            id: $request->getId(),
            code: $e->getCode(),
            message: $e->getMessage(),
            data: $e,
        );
    }

    protected function dispatch(MatchedRouteInterface $route): mixed
    {
        $handler = $this->getHandler($route);

        return $handler($route);
    }
}
