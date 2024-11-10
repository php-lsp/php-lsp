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
use Lsp\Dispatcher\Provider\HandlerProviderInterface;
use Lsp\Dispatcher\Provider\SelectableHandlerProvider;
use Lsp\Dispatcher\Resolver\CallableHandlerResolver;
use Lsp\Dispatcher\Resolver\ClassMethodHandlerResolver;
use Lsp\Dispatcher\Resolver\ClassStaticMethodHandlerResolver;
use Lsp\Dispatcher\Resolver\FunctionHandlerResolver;
use Lsp\Dispatcher\Resolver\HandlerResolverInterface;

final class Dispatcher implements DispatcherInterface
{
    private readonly HandlerProviderInterface $provider;

    /**
     * @param iterable<array-key, HandlerResolverInterface> $resolvers
     */
    public function __construct(
        private readonly RouterInterface $router,
        private readonly ResponseFactoryInterface $responses,
        iterable $resolvers = [
            new CallableHandlerResolver(),
            new ClassMethodHandlerResolver(),
            new ClassStaticMethodHandlerResolver(),
            new FunctionHandlerResolver(),
        ],
    ) {
        $this->provider = new SelectableHandlerProvider($resolvers);
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
            return $this->createFailureResponse($request, $e);
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
    private function createFailureResponse(RequestInterface $request, \Throwable $e): FailureResponseInterface
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
        $handler = $this->provider->getHandler($route);

        return $handler($route);
    }
}
