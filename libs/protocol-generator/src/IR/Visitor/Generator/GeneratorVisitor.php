<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Visitor\Generator;

use Lsp\Protocol\Generator\IR\Node\IRDocument;
use Lsp\Protocol\Generator\IR\Visitor\Service\TypeBuilder;
use Lsp\Protocol\Generator\MetaModel\Node\MetaModel;
use PhpParser\NodeVisitorAbstract;

abstract class GeneratorVisitor extends NodeVisitorAbstract
{
    final public function __construct(
        protected readonly IRDocument $document,
        protected readonly MetaModel $model,
        protected readonly TypeBuilder $types,
    ) {}
}
