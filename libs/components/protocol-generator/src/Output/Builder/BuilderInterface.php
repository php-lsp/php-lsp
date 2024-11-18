<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\Builder;

use Lsp\Protocol\Generator\IR\Node\IRStatement;
use PhpParser\Node\Stmt as PhpStatement;

interface BuilderInterface
{
    public function build(IRStatement $stmt): ?PhpStatement;
}
