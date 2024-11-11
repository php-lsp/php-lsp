<?php

declare(strict_types=1);

namespace Lsp\Contracts\Server\Tests;

use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Server\ConnectionInterface;
use Lsp\Contracts\Server\DriverInterface;
use Lsp\Contracts\Server\RunnableInterface;
use Lsp\Contracts\Server\ServerInterface;
use PHPUnit\Framework\Attributes\Group;
use React\Promise\PromiseInterface;

/**
 * Note: Changing the behavior of these tests is allowed ONLY when updating
 *       a MAJOR version of the package.
 */
#[Group('php-lsp/server-contracts'), Group('unit')]
final class InterfaceCompatibilityTest extends TestCase
{
    public function testConnectionCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements ConnectionInterface {
            public function getServer(): ServerInterface {}
            public function notify(NotificationInterface $notification): ?\Throwable {}
            public function call(RequestInterface $request): PromiseInterface {}
            public function close(): void {}
        };
    }

    public function testDriverCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements DriverInterface {
            public function create(string $dsn): ServerInterface {}
            public function run(): void {}
            public function stop(): void {}
        };
    }

    public function testRunnableCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements RunnableInterface {
            public function run(): void {}
            public function stop(): void {}
        };
    }

    public function testServerCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements ServerInterface {
            public function getDriver(): DriverInterface {}
            public function getDataSourceName(): string {}
        };
    }
}
