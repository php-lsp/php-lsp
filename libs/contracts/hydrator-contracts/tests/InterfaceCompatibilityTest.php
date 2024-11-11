<?php

declare(strict_types=1);

namespace Lsp\Contracts\Hydrator\Tests;

use Lsp\Contracts\Hydrator\Exception\HydratorExceptionInterface;
use Lsp\Contracts\Hydrator\ExtractorInterface;
use Lsp\Contracts\Hydrator\HydratorInterface;
use PHPUnit\Framework\Attributes\Group;

/**
 * Note: Changing the behavior of these tests is allowed ONLY when updating
 *       a MAJOR version of the package.
 */
#[Group('php-lsp/hydrator-contracts'), Group('unit')]
final class InterfaceCompatibilityTest extends TestCase
{
    public function testExtractorCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements ExtractorInterface {
            public function extract(mixed $data, ?string $type = null): mixed {}
        };
    }

    public function testHydratorCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class implements HydratorInterface {
            public function hydrate(string $type, mixed $data): mixed {}
        };
    }

    public function testHydratorExceptionCompatibility(): void
    {
        self::expectNotToPerformAssertions();

        new class extends \Exception implements HydratorExceptionInterface {};
    }
}
