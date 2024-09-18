<?php

declare(strict_types=1);

namespace Lsp\Router;

use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Router\Exception\RouteNotFoundException;
use Lsp\Router\Route\MatchedRouteInterface;

final class MemoizedRouter implements RouterInterface
{
    /**
     * @var \WeakMap<NotificationInterface, MatchedRouteInterface|null>
     */
    private readonly \WeakMap $requests;

    public function __construct(
        private readonly RouterInterface $delegate,
    ) {
        $this->requests = new \WeakMap();
    }

    public function match(NotificationInterface $request): ?MatchedRouteInterface
    {
        // @phpstan-ignore-next-line
        return $this->requests[$request] ??= $this->delegate->match($request);
    }

    public function matchOrFail(NotificationInterface $request): MatchedRouteInterface
    {
        return $this->match($request)
            ?? throw new RouteNotFoundException($request);
    }
}
