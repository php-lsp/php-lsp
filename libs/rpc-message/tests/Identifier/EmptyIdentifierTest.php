<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Tests\Identifier;

use Lsp\Rpc\Message\EmptyIdentifier;
use Lsp\Rpc\Message\IntIdentifier;
use Lsp\Rpc\Message\StringIdentifier;
use Lsp\Rpc\Message\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

#[Group('php-lsp/rpc-message'), Group('unit')]
final class EmptyIdentifierTest extends TestCase
{
    public function testIsSameInstance(): void
    {
        $id = EmptyIdentifier::getInstance();

        self::assertSame($id, EmptyIdentifier::getInstance());
    }

    public function testMatchInstances(): void
    {
        $id = new EmptyIdentifier();

        self::assertTrue($id->equals(new EmptyIdentifier()));

        self::assertFalse($id->equals(new IntIdentifier(42)));
        self::assertFalse($id->equals(new StringIdentifier('test')));
    }

    public function testPrimitiveValue(): void
    {
        $id = new EmptyIdentifier();

        self::assertNull($id->toPrimitive());
    }

    public function testStringRepresentation(): void
    {
        $id = new EmptyIdentifier();

        self::assertSame('', (string)$id);
    }
}
