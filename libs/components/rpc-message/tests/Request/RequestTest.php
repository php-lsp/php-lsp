<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Tests\Request;

use Lsp\Rpc\Message\EmptyIdentifier;
use Lsp\Rpc\Message\IntIdentifier;
use Lsp\Rpc\Message\Request;
use Lsp\Rpc\Message\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

#[Group('php-lsp/rpc-message'), Group('unit')]
final class RequestTest extends TestCase
{
    public function testEmptyMethodNameNotAvailable(): void
    {
        if (!$this->assertionsEnabled()) {
            self::markTestSkipped('PHP assertions not enabled');
        }

        self::expectExceptionMessage('Method name cannot be empty');

        new Request(EmptyIdentifier::getInstance(), '');
    }

    public function testSameIdentifier(): void
    {
        $notification = new Request(
            $id = new IntIdentifier(0xDEAD_BEEF),
            'method',
        );

        self::assertSame($id, $notification->getId());
    }

    public function testMethod(): void
    {
        $notification = new Request(
            EmptyIdentifier::getInstance(),
            $method = 'ExAmPlE',
        );

        self::assertSame($method, $notification->getMethod());
    }

    public function testIndexedParameters(): void
    {
        $notification = new Request(
            EmptyIdentifier::getInstance(),
            'method',
            $params = [
                'test',
                'some',
                ['inner' => 42],
            ],
        );

        self::assertSame($params, $notification->getParameters());
    }

    public function testNamedParameters(): void
    {
        $notification = new Request(
            EmptyIdentifier::getInstance(),
            'method',
            $params = [
                'a' => 'test',
                'b' => 'some',
                'C' => ['inner' => 42],
            ],
        );

        self::assertSame($params, $notification->getParameters());
    }

    public function testMixedParameters(): void
    {
        $notification = new Request(
            EmptyIdentifier::getInstance(),
            'method',
            $params = [
                'a' => 'test',
                'some',
                'b' => ['inner' => 42],
            ],
        );

        self::assertSame($params, $notification->getParameters());
    }
}
