<?php

declare(strict_types=1);

namespace Lsp\Dispatcher;

use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Contracts\Router\RouterInterface;
use Lsp\Contracts\Rpc\Message\Factory\IdFactoryInterface;
use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;
use Lsp\Contracts\Rpc\Message\FailureResponseInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use Lsp\Dispatcher\Argument\Provider\ArgumentProviderInterface;
use Lsp\Dispatcher\Handler\Provider\HandlerProviderInterface;
use Lsp\Dispatcher\Result\Provider\ResultProviderInterface;

final class Dispatcher implements DispatcherInterface
{
    public function __construct(
        private readonly RouterInterface $router,
        private readonly IdFactoryInterface $ids,
        private readonly ResponseFactoryInterface $responses,
        private readonly HandlerProviderInterface $handlers,
        private readonly ArgumentProviderInterface $arguments,
        private readonly ResultProviderInterface $results,
    ) {}

    public function notify(NotificationInterface $notification): ?FailureResponseInterface
    {
        try {
            $route = $this->router->matchOrFail($notification);

            $this->dispatch($route);
        } catch (\Throwable $e) {
            return $this->responses->createFailure(
                id: $this->ids->create(),
                code: $e->getCode(),
                message: $e->getMessage(),
                data: $e,
            );
        }

        return null;
    }

    public function call(RequestInterface $request): ResponseInterface
    {
        try {
            // Matched route
            $route = $this->router->matchOrFail($request);

            // Dispatch route and fetch result
            $result = $this->dispatch($route);

            // Transform result to the response format
            $response = $this->results->getResult($result);
        } catch (\Throwable $e) {
            return $this->responses->createFailure(
                id: $request->getId(),
                code: $e->getCode(),
                message: $e->getMessage(),
                data: $e,
            );
        }

        return $this->responses->createSuccess($request, $response);
    }

    protected function dispatch(MatchedRouteInterface $route): mixed
    {
        $handler = $this->handlers->getHandler($route);

        $arguments = $this->arguments->getAllArguments($route, $handler);

        return $handler(...$arguments);
    }
}
