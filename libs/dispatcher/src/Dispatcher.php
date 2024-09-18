<?php

declare(strict_types=1);

namespace Lsp\Dispatcher;

use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use Lsp\Router\Route\MatchedRouteInterface;
use Lsp\Router\RouterInterface;

final class Dispatcher implements DispatcherInterface
{
    public function __construct(
        private readonly RouterInterface $router,
        private readonly ResponseFactoryInterface $responses,
    ) {}

    protected function getHandler(MatchedRouteInterface $route): callable
    {
        return function () {
            return 42;
        };
    }

    public function notify(NotificationInterface $notification): void
    {
        $route = $this->router->matchOrFail($notification);

        $this->dispatch($route);
    }

    public function call(RequestInterface $request): ResponseInterface
    {
        $route = $this->router->matchOrFail($request);

        try {
            $result = $this->dispatch($route);
        } catch (\Throwable $e) {
            return $this->responses->createFailure(
                id: $request->getId(),
                code: $e->getCode(),
                message: $e->getMessage(),
                data: $e,
            );
        }

        return $this->responses->createSuccess($request, $result);
    }

    private function dispatch(MatchedRouteInterface $route): mixed
    {
        $handler = $this->getHandler($route);

        return $handler($route);
    }
}
