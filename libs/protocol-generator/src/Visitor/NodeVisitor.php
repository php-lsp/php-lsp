<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Visitor;

use PhpParser\Node as PhpNodeInterface;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\Node\Stmt\Namespace_ as PhpNamespaceStatement;

abstract class NodeVisitor extends Visitor
{
    /**
     * @param \ArrayObject<array-key, PhpNodeInterface> $types
     */
    public function __construct(
        private readonly \ArrayObject $types,
    ) {}

    protected function createNamespaceFor(ClassLike $stmt): Name
    {
        return new Name('Lsp\Protocol');
    }

    protected function add(ClassLike $stmt): void
    {
        $this->types->append(new PhpNamespaceStatement(
            name: $this->createNamespaceFor($stmt),
            stmts: [$stmt],
        ));
    }
}
