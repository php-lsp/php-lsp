<?php

declare(strict_types=1);

namespace Lsp\Server\Tests;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase as BaseTestCase;

#[Group('php-lsp/server')]
abstract class TestCase extends BaseTestCase {}
