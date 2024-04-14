<?php

declare(strict_types=1);

namespace Lsp\Rpc\Protocol\Tests;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase as BaseTestCase;

#[Group('php-lsp/rpc-protocol-jsonrpc')]
abstract class TestCase extends BaseTestCase
{
    protected function assertionsEnabled(): bool
    {
        try {
            assert(false);
            return false;
        } catch (\Throwable $e) {
            return true;
        }
    }
}
