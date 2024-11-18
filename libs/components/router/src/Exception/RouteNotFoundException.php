<?php

declare(strict_types=1);

namespace Lsp\Router\Exception;

use Lsp\Contracts\Router\Exception\RoutingExceptionInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;

/**
 * @phpstan-consistent-constructor
 */
final class RouteNotFoundException extends \RuntimeException implements
    RoutingExceptionInterface
{
    public function __construct(
        private readonly NotificationInterface $request,
        int $code = 0,
        ?\Throwable $previous = null,
    ) {
        $message = \sprintf('Route for method "%s" not found', $request->getMethod());

        parent::__construct($message, $code, $previous);
    }

    public function getRequest(): NotificationInterface
    {
        return $this->request;
    }
}
