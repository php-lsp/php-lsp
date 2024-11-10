<?php

declare(strict_types=1);

namespace Lsp\Contracts\Dispatcher\Tests;

use Lsp\Contracts\Dispatcher\DispatcherInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\ResponseInterface;
use PHPUnit\Framework\Attributes\Group;

/**
 * Note: Changing the behavior of these tests is allowed ONLY when updating
 *       a MAJOR version of the package.
 */
#[Group('php-lsp/dispatcher-contracts'), Group('unit')]
final class InterfaceCompatibilityTest extends TestCase
{
    public function testRouterCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements DispatcherInterface {
            public function notify(NotificationInterface $notification): ?\Throwable {}

            public function call(RequestInterface $request): ResponseInterface {}
        };
    }
}