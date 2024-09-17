<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Tests\Response;

use Lsp\Rpc\Message\EmptyIdentifier;
use Lsp\Rpc\Message\IntIdentifier;
use Lsp\Rpc\Message\Request;
use Lsp\Rpc\Message\SuccessfulResponse;
use Lsp\Rpc\Message\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

#[Group('php-lsp/rpc-message'), Group('unit')]
final class SuccessfulResponseTest extends TestCase
{
    public function testIdentifier(): void
    {
        $response = new SuccessfulResponse(
            $id = EmptyIdentifier::getInstance(),
            null,
        );

        self::assertSame($id, $response->getId());
    }

    public function testResult(): void
    {
        $response = new SuccessfulResponse(
            EmptyIdentifier::getInstance(),
            $data = (object) ["\0test\0field" => 42],
        );

        self::assertSame($data, $response->getResult());
    }

    public function testSameRequest(): void
    {
        $id = new IntIdentifier(0xDEAD_BEEF);

        $request = new Request($id, 'example');
        $response = new SuccessfulResponse($id, 'data');

        self::assertTrue($response->matchesRequest($request));
    }
}
