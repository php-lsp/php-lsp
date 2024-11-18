<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Visitor\Linker;

use Lsp\Protocol\Generator\IR\Node\IRDocument;
use Lsp\Protocol\Generator\MetaModel\Node\MetaModel;
use PhpParser\NodeVisitorAbstract;

abstract class LinkerVisitor extends NodeVisitorAbstract
{
    final public function __construct(
        protected readonly MetaModel $model,
        protected readonly IRDocument $document,
    ) {}
}
