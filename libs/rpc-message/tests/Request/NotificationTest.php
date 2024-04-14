<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Tests\Request;

use Lsp\Rpc\Message\Notification;
use Lsp\Rpc\Message\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

#[Group('php-lsp/rpc-message'), Group('unit')]
final class NotificationTest extends TestCase
{
    public function testEmptyMethodNameNotAvailable(): void
    {
        if (!$this->assertionsEnabled()) {
            self::markTestSkipped('PHP assertions not enabled');
        }

        self::expectExceptionMessage('Method name cannot be empty');

        new Notification('');
    }

    public function testMethod(): void
    {
        $notification = new Notification($method = 'ExAmPlE');

        self::assertSame($method, $notification->getMethod());
    }

    public function testIndexedParameters(): void
    {
        $notification = new Notification('method', $params = [
            'test',
            'some',
            ['inner' => 42],
        ]);

        self::assertSame($params, $notification->getParameters());
    }

    public function testNamedParameters(): void
    {
        $notification = new Notification('method', $params = [
            'a' => 'test',
            'b' => 'some',
            'C' => ['inner' => 42],
        ]);

        self::assertSame($params, $notification->getParameters());
    }

    public function testMixedParameters(): void
    {
        $notification = new Notification('method', $params = [
            'a' => 'test',
            'some',
            'b' => ['inner' => 42],
        ]);

        self::assertSame($params, $notification->getParameters());
    }
}
