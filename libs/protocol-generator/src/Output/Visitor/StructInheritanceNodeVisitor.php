<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\Visitor;

use Lsp\Protocol\Generator\MetaModel\Node\MetaModel;
use Lsp\Protocol\Generator\MetaModel\Node\Structure;
use Lsp\Protocol\Generator\MetaModel\Node\Type\ReferenceType;
use PhpParser\Node;

final class StructInheritanceNodeVisitor extends Visitor
{
    public function enterNode(Node $node): mixed
    {
        if (!$node instanceof MetaModel) {
            return null;
        }

        foreach ($node->structures as $struct) {
            $this->lookupStructMixins($node, $struct);
            $this->lookupStructParents($node, $struct);
        }

        return null;
    }

    private function lookupStructParents(MetaModel $ctx, Structure $struct): void
    {
        foreach ($struct->extends ?? [] as $ref) {
            if (!$ref instanceof ReferenceType) {
                continue;
            }

            $type = $ctx->findReference($ref);

            if ($type instanceof Structure) {
                $type->markAsParent();
            }
        }
    }

    private function lookupStructMixins(MetaModel $ctx, Structure $struct): void
    {
        foreach ($struct->mixins ?? [] as $ref) {
            if (!$ref instanceof ReferenceType) {
                continue;
            }

            $type = $ctx->findReference($ref);

            if ($type instanceof Structure) {
                $type->markAsMixin();
            }
        }
    }
}
