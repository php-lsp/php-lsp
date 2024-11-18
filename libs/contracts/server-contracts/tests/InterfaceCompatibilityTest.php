<?php

declare(strict_types=1);

namespace Lsp\Contracts\Server\Tests;

use PHPUnit\Framework\Attributes\Group;

/**
 * Note: Changing the behavior of these tests is allowed ONLY when updating
 *       a MAJOR version of the package.
 */
#[Group('php-lsp/server-contracts'), Group('unit')]
final class InterfaceCompatibilityTest extends TestCase
{
    public function testRouterCompatibility(): void
    {
        self::expectNotToPerformAssertions();
    }
}
