<?php

declare(strict_types=1);

namespace Lsp\Contracts\Rpc\Codec\Tests;

use Lsp\Contracts\Rpc\Message\MessageInterface;
use Lsp\Contracts\Rpc\Codec\DecoderInterface;
use Lsp\Contracts\Rpc\Codec\EncoderInterface;
use Lsp\Contracts\Rpc\Codec\Exception\DecodingExceptionInterface;
use Lsp\Contracts\Rpc\Codec\Exception\CodecExceptionInterface;
use PHPUnit\Framework\Attributes\Group;

/**
 * Note: Changing the behavior of these tests is allowed ONLY when updating
 *       a MAJOR version of the package.
 */
#[Group('php-lsp/rpc-codec-contracts'), Group('unit')]
final class InterfaceCompatibilityTest extends TestCase
{
    public function testDecoderCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements DecoderInterface {
            public function decode(string $data): MessageInterface {}
        };
    }

    public function testEncoderCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements EncoderInterface {
            public function encode(MessageInterface $message): string {}
        };
    }

    public function testExceptionCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class extends \Exception implements CodecExceptionInterface {};
    }

    public function testDecodingExceptionCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class extends \Exception implements DecodingExceptionInterface {};
    }

    public function testEncodingExceptionCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class extends \Exception implements DecodingExceptionInterface {};
    }
}
