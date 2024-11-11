<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Visitor\Generator;

use Lsp\Protocol\Generator\IR\Node\IRMixinStatement;
use Lsp\Protocol\Generator\IR\Node\IRStructStatement;
use Lsp\Protocol\Generator\IR\Visitor\Analyzer\MixinsAnalyzerVisitor;
use Lsp\Protocol\Generator\MetaModel\Node\MetaStructure;
use PhpParser\Node;

final class MixinGeneratorVisitor extends GeneratorVisitor
{
    public function leaveNode(Node $node): mixed
    {
        if (!$node instanceof MetaStructure || !MixinsAnalyzerVisitor::isMixin($node)) {
            return null;
        }

        $mixin = $this->createMixinStatement($node);

        foreach ($node->properties as $property) {
            $mixin->properties[] = $this->createProperty($property);
        }

        $this->document->add($mixin);
        $this->document->add($this->createVirtualStruct($node, $mixin));

        return null;
    }

    /**
     * @return non-empty-string
     */
    public static function getMixinName(MetaStructure $node): string
    {
        return $node->name . 'Mixin';
    }

    private function createMixinStatement(MetaStructure $node): IRMixinStatement
    {
        $mixin = new IRMixinStatement(self::getMixinName($node));

        $mixin->description = $node->documentation;
        $mixin->deprecated = $node->deprecated;
        $mixin->since = $node->since;
        $mixin->proposed = (bool) $node->proposed;

        return $mixin;
    }

    private function createVirtualStruct(MetaStructure $node, IRMixinStatement $context): IRStructStatement
    {
        $struct = new IRStructStatement($node->name);

        $struct->description = $node->documentation;
        $struct->deprecated = $node->deprecated;
        $struct->since = $node->since;
        $struct->proposed = (bool) $node->proposed;

        $struct->mixins[] = $context;

        return $struct;
    }
}
