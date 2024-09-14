<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\Visitor;

use Lsp\Protocol\Generator\MetaModel\Node\MetaModel;
use Lsp\Protocol\Generator\MetaModel\Node\Structure;
use Lsp\Protocol\Generator\MetaModel\Node\Type\ReferenceType;
use PhpParser\Node as NodeInterface;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\ClassLike as PhpClassLikeStatement;
use PhpParser\Node\Stmt\Use_ as PhpUseStatement;
use PhpParser\Node\UseItem;

abstract class StructLikeNodeVisitor extends NodeVisitor
{
    protected ?MetaModel $context = null;

    public function __construct(\ArrayObject $types, string $namespace)
    {
        parent::__construct($types, $namespace);
    }

    public function beforeTraverse(array $nodes): mixed
    {
        $this->context = null;

        return null;
    }

    public function enterNode(NodeInterface $node): mixed
    {
        switch (true) {
            case $node instanceof MetaModel:
                $this->context = $node;

                return null;

            case $node instanceof Structure:
                $this->enterStruct($node);

                return null;

            default:
                return null;
        }
    }

    abstract protected function enterStruct(Structure $struct): void;

    protected function applyMixins(PhpClassLikeStatement $statement, Structure $struct): void
    {
        foreach ([...($struct->mixins ?? []), ...($struct->extends ?? [])] as $mixin) {
            if (!$mixin instanceof ReferenceType) {
                continue;
            }

            $statement->stmts[] = new PhpUseStatement([
                new UseItem(new Name(
                    name: $mixin->name . 'Mixin',
                )),
            ]);
        }
    }
}
