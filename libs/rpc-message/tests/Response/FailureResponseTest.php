<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Tests\Response;

use Lsp\Rpc\Message\EmptyIdentifier;
use Lsp\Rpc\Message\FailureResponse;
use Lsp\Rpc\Message\IntIdentifier;
use Lsp\Rpc\Message\Request;
use Lsp\Rpc\Message\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

#[Group('php-lsp/rpc-message'), Group('unit')]
final class FailureResponseTest extends TestCase
{
    public function testIdentifier(): void
    {
        $response = new FailureResponse(
            $id = EmptyIdentifier::getInstance(),
        );

        self::assertSame($id, $response->getId());
    }

    public function testErrorCode(): void
    {
        $response = new FailureResponse(
            EmptyIdentifier::getInstance(),
            $code = 0xDEAD_BEEF,
        );

        self::assertSame($code, $response->getCode());
    }

    public function testNegativeErrorCode(): void
    {
        $response = new FailureResponse(
            EmptyIdentifier::getInstance(),
            $code = -0xDEAD_BEEF,
        );

        self::assertSame($code, $response->getCode());
    }

    public function testZeroErrorCodeByDefault(): void
    {
        $response = new FailureResponse(
            EmptyIdentifier::getInstance(),
        );

        self::assertSame(0, $response->getCode());
    }


    public function testErrorMessage(): void
    {
        $response = new FailureResponse(
            EmptyIdentifier::getInstance(),
            0,
            $message = 'example message',
        );

        self::assertSame($message, $response->getMessage());
    }

    public function testEmptyErrorMessage(): void
    {
        $response = new FailureResponse(
            EmptyIdentifier::getInstance(),
            0,
            $message = '',
        );

        self::assertSame($message, $response->getMessage());
    }

    public function testEmptyErrorMessageByDefault(): void
    {
        $response = new FailureResponse(
            EmptyIdentifier::getInstance(),
        );

        self::assertSame('', $response->getMessage());
    }

    public function testSameErrorData(): void
    {
        $response = new FailureResponse(
            EmptyIdentifier::getInstance(),
            0,
            '',
            $data = (object)["\0test\0field" => 42],
        );

        self::assertSame($data, $response->getData());
    }

    public function testSameRequest(): void
    {
        $id = new IntIdentifier(0xDEAD_BEEF);

        $request = new Request($id, 'example');
        $response = new FailureResponse($id);

        self::assertTrue($response->matchesRequest($request));
    }
}
