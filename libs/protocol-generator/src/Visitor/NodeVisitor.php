<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Visitor;

use PhpParser\Node as PhpNodeInterface;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt;
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

    /**
     * @param list<Stmt> $before
     */
    protected function createNamespace(ClassLike $stmt, array $before = []): PhpNamespaceStatement
    {
        return new PhpNamespaceStatement(
            name: new Name('Lsp\Protocol'),
            stmts: [...$before, $stmt],
        );
    }

    protected function add(PhpNodeInterface $stmt): void
    {
        if ($stmt instanceof ClassLike) {
            $stmt = $this->createNamespace($stmt);
        }

        $this->types->append($stmt);
    }
}
