<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\Builder;

use Lsp\Protocol\Generator\Output\Builder\Service\PhpTypeBuilder;
use Lsp\Protocol\Generator\Output\DocBlock\DocBlockBuilder;

abstract class Builder implements BuilderInterface
{
    final public function __construct(
        protected readonly PhpTypeBuilder $types,
        protected readonly DocBlockBuilder $docblock,
    ) {}
}
