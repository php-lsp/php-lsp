<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Tests\Identifier;

use Lsp\Rpc\Message\EmptyIdentifier;
use Lsp\Rpc\Message\IntIdentifier;
use Lsp\Rpc\Message\StringIdentifier;
use Lsp\Rpc\Message\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

#[Group('php-lsp/rpc-message'), Group('unit')]
final class StringIdentifierTest extends TestCase
{
    public function testEmptyStringNotAllowed(): void
    {
        if (!$this->assertionsEnabled()) {
            self::markTestSkipped('PHP assertions not enabled');
        }

        self::expectExceptionMessage('String identifier cannot be empty');

        new StringIdentifier('');
    }

    public function testSameInstance(): void
    {
        $id = new StringIdentifier('example');

        self::assertTrue($id->equals($id));
    }

    public function testEqualStringInstance(): void
    {
        $id = new StringIdentifier('example');

        self::assertTrue($id->equals(new StringIdentifier(
            'example',
        )));
    }

    public function testNotEqualAnotherStringInstance(): void
    {
        $id = new StringIdentifier('example');

        self::assertFalse($id->equals(new StringIdentifier(
            'example-another',
        )));
    }

    public function testEqualIntInstance(): void
    {
        $id = new StringIdentifier((string)0xDEAD_BEEF);

        self::assertTrue($id->equals(new IntIdentifier(
            0xDEAD_BEEF,
        )));
    }

    public function testNotEqualAnotherIntInstance(): void
    {
        $id = new StringIdentifier((string)0xDEAD_BEEF);

        self::assertFalse($id->equals(new IntIdentifier(
            0xDEAD_BEEF + 1,
        )));
    }

    public function testNotEqualEmptyInstance(): void
    {
        // string(" ") != null
        $int = new StringIdentifier(' ');
        self::assertFalse($int->equals(new EmptyIdentifier()));

        // string("\0") != null
        $int = new StringIdentifier("\0");
        self::assertFalse($int->equals(new EmptyIdentifier()));

        // null != string(" ")
        $empty = new EmptyIdentifier();
        self::assertFalse($empty->equals(new StringIdentifier(' ')));

        // null != string("\0")
        $empty = new EmptyIdentifier();
        self::assertFalse($empty->equals(new StringIdentifier("\0")));
    }

    public function testPrimitiveValue(): void
    {
        $id = new StringIdentifier('example');

        self::assertSame('example', $id->toPrimitive());
    }

    public function testStringRepresentation(): void
    {
        $id = new StringIdentifier('example');

        self::assertSame('example', (string)$id);
    }
}
