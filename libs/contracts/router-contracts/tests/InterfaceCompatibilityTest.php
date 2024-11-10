<?php

declare(strict_types=1);

namespace Lsp\Contracts\Router\Tests;

use Lsp\Contracts\Router\Exception\RouterExceptionInterface;
use Lsp\Contracts\Router\Exception\RoutingExceptionInterface;
use Lsp\Contracts\Router\MatchedRouteInterface;
use Lsp\Contracts\Router\RouteInterface;
use Lsp\Contracts\Router\RouterInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use PHPUnit\Framework\Attributes\Group;

/**
 * Note: Changing the behavior of these tests is allowed ONLY when updating
 *       a MAJOR version of the package.
 */
#[Group('php-lsp/router-contracts'), Group('unit')]
final class InterfaceCompatibilityTest extends TestCase
{
    public function testRouterCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements RouterInterface {
            public function match(NotificationInterface $request): ?MatchedRouteInterface {}

            public function matchOrFail(NotificationInterface $request): MatchedRouteInterface {}
        };
    }

    public function testRouteCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements RouteInterface {
            public function getMethod(): string {}

            public function getHandler(): callable {}
        };
    }

    public function testMatchedRouteCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements MatchedRouteInterface {
            public function getMethod(): string {}

            public function getHandler(): callable {}

            public function getRequest(): NotificationInterface {}
        };
    }

    public function testRouterExceptionCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class extends \Exception implements
            RouterExceptionInterface {};
    }

    public function testRoutingExceptionCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class extends \Exception implements RoutingExceptionInterface {
            public function getRequest(): NotificationInterface {}
        };
    }
}
