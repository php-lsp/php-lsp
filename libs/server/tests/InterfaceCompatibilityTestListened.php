<?php

declare(strict_types=1);

namespace Lsp\Server\Tests;

use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Server\ServerInterface;
use Lsp\Contracts\Server\ServerInterface;
use Lsp\Contracts\Server\ServerInterface;
use Lsp\Server\ClientInterface;
use PHPUnit\Framework\Attributes\Group;
use React\Promise\PromiseInterface;

/**
 * Note: Changing the behavior of these tests is allowed ONLY when updating
 *       a MAJOR version of the package.
 */
#[Group('php-lsp/server'), Group('unit')]
final class InterfaceCompatibilityTest extends TestCase
{
    public function testConnectionCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements ClientInterface {
            public function getClientAddress(): string {}

            public function getServer(): ServerInterface {}

            public function notify(NotificationInterface $notification): ?\Throwable {}

            public function call(RequestInterface $request): PromiseInterface {}

            public function close(): void {}
        };
    }

    public function testDriverCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements ServerInterface {
            public function listen(string $dsn): ServerInterface {}

            public function run(): void {}

            public function stop(): void {}
        };
    }

    public function testRunnableCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements ServerInterface {
            public function run(): void {}

            public function stop(): void {}
        };
    }

    public function testServerCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements ServerInterface {
            public function getDriver(): ServerInterface {}

            public function getDataSourceName(): string {}
        };
    }
}
