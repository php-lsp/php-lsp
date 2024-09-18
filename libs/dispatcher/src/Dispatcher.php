<?php

declare(strict_types=1);

namespace Lsp\Dispatcher;

use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use Lsp\Router\Route\MatchedRouteInterface;
use Lsp\Router\RouterInterface;
use Lsp\Rpc\Message\Factory\ResponseFactory;

final class Dispatcher implements DispatcherInterface
{
    private readonly ResponseFactoryInterface $responses;

    public function __construct(
        private readonly RouterInterface $router,
        ?ResponseFactoryInterface $responses = null,
    ) {
        $this->responses = $responses ?? $this->createResponseFactory();
    }

    private function createResponseFactory(): ResponseFactoryInterface
    {
        if (\class_exists(ResponseFactory::class)) {
            return new ResponseFactory();
        }

        $message = 'Unable to find available factory implementation: '
            . 'Please specify the %s explicitly or install the "%s" package';
        $message = \sprintf($message, ResponseFactoryInterface::class, 'php-lsp/rpc-message-factory');

        throw new \LogicException($message);
    }

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
