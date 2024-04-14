<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Tests\Identifier;

use Lsp\Rpc\Message\EmptyIdentifier;
use Lsp\Rpc\Message\IntIdentifier;
use Lsp\Rpc\Message\StringIdentifier;
use Lsp\Rpc\Message\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

#[Group('php-lsp/rpc-message'), Group('unit')]
final class IntIdentifierTest extends TestCase
{
    public function testSameInstance(): void
    {
        $id = new IntIdentifier(0xDEAD_BEEF);

        self::assertTrue($id->equals($id));
    }

    public function testEqualIntInstance(): void
    {
        $id = new IntIdentifier(0xDEAD_BEEF);

        self::assertTrue($id->equals(new IntIdentifier(
            0xDEAD_BEEF,
        )));
    }

    public function testNotEqualAnotherIntInstance(): void
    {
        $id = new IntIdentifier(0xDEAD_BEEF);

        self::assertFalse($id->equals(new IntIdentifier(
            0xDEAD_BEEF + 1,
        )));
    }

    public function testEqualStringInstance(): void
    {
        $id = new IntIdentifier(0xDEAD_BEEF);

        self::assertTrue($id->equals(new StringIdentifier(
            (string)0xDEAD_BEEF,
        )));
    }

    public function testNotEqualAnotherStringInstance(): void
    {
        $id = new IntIdentifier(0xDEAD_BEEF);

        self::assertFalse($id->equals(new StringIdentifier(
            (string)(0xDEAD_BEEF + 1)
        )));
    }

    public function testNotEqualEmptyInstance(): void
    {
        // int(0) != null
        $int = new IntIdentifier(0);
        self::assertFalse($int->equals(new EmptyIdentifier()));

        // null != int(0)
        $empty = new EmptyIdentifier();
        self::assertFalse($empty->equals(new IntIdentifier(0)));
    }

    public function testPositivePrimitiveValue(): void
    {
        $id = new IntIdentifier(0xDEAD_BEEF);

        self::assertSame(0xDEAD_BEEF, $id->toPrimitive());
    }

    public function testNegativePrimitiveValue(): void
    {
        $id = new IntIdentifier(-0xDEAD_BEEF);

        self::assertSame(-0xDEAD_BEEF, $id->toPrimitive());
    }

    public function testStringRepresentation(): void
    {
        $id = new IntIdentifier(0xDEAD_BEEF);

        self::assertSame((string)0xDEAD_BEEF, (string)$id);
    }
}
