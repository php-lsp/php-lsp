<?php

declare(strict_types=1);

namespace Lsp\Contracts\Rpc\Message\Factory\Tests;

use Lsp\Contracts\Rpc\Message\Factory\IdFactoryInterface;
use Lsp\Contracts\Rpc\Message\Factory\RequestFactoryInterface;
use Lsp\Contracts\Rpc\Message\Factory\ResponseFactoryInterface;
use Lsp\Contracts\Rpc\Message\FailureResponseInterface;
use Lsp\Contracts\Rpc\Message\IdentifiableInterface;
use Lsp\Contracts\Rpc\Message\IdInterface;
use Lsp\Contracts\Rpc\Message\NotificationInterface;
use Lsp\Contracts\Rpc\Message\RequestInterface;
use Lsp\Contracts\Rpc\Message\SuccessfulResponseInterface;
use PHPUnit\Framework\Attributes\Group;

/**
 * Note: Changing the behavior of these tests is allowed ONLY when updating
 *       a MAJOR version of the package.
 */
#[Group('php-lsp/rpc-message-factory-contracts'), Group('unit')]
final class InterfaceCompatibilityTest extends TestCase
{
    public function testIdFactoryCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class () implements IdFactoryInterface {
            public function create(mixed $id = null): IdInterface {}
        };
    }

    public function testRequestFactoryCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class () implements RequestFactoryInterface {
            public function createRequest(
                string $method,
                array $parameters = [],
                IdInterface $id = null,
            ): RequestInterface {}

            public function createNotification(
                string $method,
                array $parameters = [],
            ): NotificationInterface {}
        };
    }

    public function testResponseFactoryCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class () implements ResponseFactoryInterface {
            public function createSuccess(
                IdInterface|IdentifiableInterface $id,
                mixed $result = null,
            ): SuccessfulResponseInterface {}
            public function createFailure(
                IdInterface|IdentifiableInterface $id,
                int $code = 0,
                string $message = '',
                mixed $data = null,
            ): FailureResponseInterface {}
        };
    }
}
