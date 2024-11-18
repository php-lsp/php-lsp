<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Visitor\Generator;

use Lsp\Protocol\Generator\IR\Node\IRStructStatement;
use Lsp\Protocol\Generator\IR\Visitor\Analyzer\MixinsAnalyzerVisitor;
use Lsp\Protocol\Generator\MetaModel\Node\MetaStructure;
use PhpParser\Node;

final class StructGeneratorVisitor extends GeneratorVisitor
{
    public function leaveNode(Node $node): mixed
    {
        if (!$node instanceof MetaStructure || MixinsAnalyzerVisitor::isMixin($node)) {
            return null;
        }

        $struct = $this->createStructStatement($node);

        foreach ($node->properties as $property) {
            $struct->properties[] = $this->createProperty($property);
        }

        $this->document->add($struct);

        return null;
    }

    /**
     * @return non-empty-string
     */
    public static function getStructName(MetaStructure $node): string
    {
        return $node->name;
    }

    private function createStructStatement(MetaStructure $node): IRStructStatement
    {
        $struct = new IRStructStatement(self::getStructName($node));

        $struct->description = $node->documentation;
        $struct->deprecated = $node->deprecated;
        $struct->since = $node->since;
        $struct->proposed = (bool) $node->proposed;

        return $struct;
    }
}
