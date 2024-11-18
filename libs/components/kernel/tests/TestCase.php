<?php

declare(strict_types=1);

namespace Lsp\Kernel\Tests;

use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase as BaseTestCase;

#[Group('php-lsp/kernel')]
abstract class TestCase extends BaseTestCase {}
