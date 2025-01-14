<?php

declare(strict_types=1);

namespace Lsp\Contracts\Server\Tests;

use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Server\AddressInterface;
use Lsp\Contracts\Server\ConnectionInterface;
use Lsp\Contracts\Server\ManagerInterface;
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
    public function testAddressCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements AddressInterface {
            public function getScheme(): string {}

            public function __toString(): string {}
        };
    }

    public function testConnectionCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements ConnectionInterface {
            public function getAddress(): AddressInterface {}

            public function getServer(): ServerInterface {}

            public function notify(NotificationInterface $notification): ?\Throwable {}

            public function call(RequestInterface $request): PromiseInterface {}

            public function close(): void {}
        };
    }

    public function testManagerCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements ManagerInterface, \IteratorAggregate {
            public function listen(AddressInterface|\Stringable|string $dsn): ServerInterface {}

            public function detach(ServerInterface $server): void {}

            public function count(): int {}

            public function stop(): void {}

            public function getIterator(): \Traversable {}
        };
    }

    public function testServerCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements ServerInterface, \IteratorAggregate {
            public function getManager(): ManagerInterface {}

            public function getAddress(): AddressInterface {}

            public function close(ConnectionInterface $client): void {}

            public function count(): int {}

            public function stop(): void {}

            public function getIterator(): \Traversable {}
        };
    }
}
