<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\Visitor;

use Lsp\Protocol\Generator\MetaModel\Node\Property;
use Lsp\Protocol\Generator\MetaModel\Node\Type\BaseType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\OrType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\ReferenceType;
use PhpParser\Node as NodeInterface;

final class OptionalPropertyNodeVisitor extends Visitor
{
    public function enterNode(NodeInterface $node): void
    {
        if (!$node instanceof Property || $node->optional !== true) {
            return;
        }

        if ($node->type instanceof OrType) {
            if (\in_array(BaseType::NULL, $node->type->items, true)) {
                return;
            }

            $node->type->items[] = BaseType::NULL;

            return;
        }

        if ($node->type instanceof ReferenceType && $node->type->name === 'LSPAny') {
            return;
        }

        $node->type = new OrType([$node->type, BaseType::NULL]);
    }
}
