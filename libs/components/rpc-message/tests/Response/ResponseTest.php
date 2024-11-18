<?php

declare(strict_types=1);

namespace Lsp\Rpc\Message\Tests\Response;

use Lsp\Rpc\Message\EmptyIdentifier;
use Lsp\Rpc\Message\IntIdentifier;
use Lsp\Rpc\Message\Request;
use Lsp\Rpc\Message\Response;
use Lsp\Rpc\Message\Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;

#[Group('php-lsp/rpc-message'), Group('unit')]
final class ResponseTest extends TestCase
{
    public function testIdentifier(): void
    {
        $response = new class (
            $id = EmptyIdentifier::getInstance(),
        ) extends Response {};

        self::assertSame($id, $response->getId());
    }

    public function testSameRequest(): void
    {
        $id = new IntIdentifier(0xDEAD_BEEF);

        $request = new Request($id, 'example');
        $response = new class ($id) extends Response {};

        self::assertTrue($response->matchesRequest($request));
    }
}
