<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Visitor\Linker;

use Lsp\Protocol\Generator\IR\Node\IRMixinStatement;
use Lsp\Protocol\Generator\IR\Node\IRStructStatement;
use Lsp\Protocol\Generator\IR\Visitor\Analyzer\MixinsAnalyzerVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Generator\MixinGeneratorVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Generator\StructGeneratorVisitor;
use Lsp\Protocol\Generator\MetaModel\Node\MetaStructure;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaReferenceType;
use PhpParser\Node;

final class MixinLinkerVisitor extends LinkerVisitor
{
    public function enterNode(Node $node): mixed
    {
        if (!$node instanceof MetaStructure) {
            return null;
        }

        $stmt = $this->document->find(self::getRepresentationName($node));

        switch (true) {
            case $stmt instanceof IRMixinStatement:
                $this->linkToMixin($node, $stmt);
                break;
            case $stmt instanceof IRStructStatement:
                $this->linkToStruct($node, $stmt);
                break;
        }

        return null;
    }

    private function linkToMixin(MetaStructure $stmt, IRMixinStatement $mixin): void
    {
        foreach ($this->getReferences($stmt) as $reference) {
            $mixin->mixins[] = $reference;
        }
    }

    private function linkToStruct(MetaStructure $stmt, IRStructStatement $struct): void
    {
        foreach ($this->getReferences($stmt) as $reference) {
            $struct->mixins[] = $reference;
        }
    }

    /**
     * @return iterable<array-key, IRMixinStatement>
     */
    private function getReferences(MetaStructure $stmt): iterable
    {
        foreach ($stmt->extends as $reference) {
            yield $this->getMixinByReference($stmt, $reference);
        }

        foreach ($stmt->mixins as $reference) {
            yield $this->getMixinByReference($stmt, $reference);
        }
    }

    private function getMixinByReference(MetaStructure $stmt, MetaReferenceType $reference): IRMixinStatement
    {
        $meta = $this->model->findReference($reference);

        if (!$meta instanceof MetaStructure) {
            throw new \OutOfRangeException(\sprintf(
                'Unable to find referenced type %s for type %s',
                $reference->name,
                $stmt->name,
            ));
        }

        $representation = $this->document->find(self::getRepresentationName($meta));

        if (!$representation instanceof IRMixinStatement) {
            throw new \OutOfRangeException(\sprintf(
                'Unable to find generated mixin %s for type %s',
                $reference->name,
                $meta->name,
            ));
        }

        return $representation;
    }

    /**
     * @return non-empty-string
     */
    private static function getRepresentationName(MetaStructure $stmt): string
    {
        if (MixinsAnalyzerVisitor::isMixin($stmt)) {
            return MixinGeneratorVisitor::getMixinName($stmt);
        }

        return StructGeneratorVisitor::getStructName($stmt);
    }
}
