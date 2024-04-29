<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Visitor;

use PhpParser\Node as PhpNodeInterface;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Namespace_ as PhpNamespaceStatement;

abstract class NodeVisitor extends Visitor
{
    /**
     * @param \ArrayObject<array-key, PhpNodeInterface> $types
     */
    public function __construct(
        private readonly \ArrayObject $types,
    ) {}

    protected function add(PhpNodeInterface $node): void
    {
        $this->types->append(new PhpNamespaceStatement(
            name: new Name('Lsp\Protocol'),
            stmts: [$node],
        ));
    }

    /**
     * @param callable():PhpNodeInterface $then
     */
    protected function make(callable $then): void
    {
        $this->add($then());
    }
}
