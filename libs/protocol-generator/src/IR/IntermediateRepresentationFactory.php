<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR;

use Lsp\Protocol\Generator\IR\Node\IRDocument;
use Lsp\Protocol\Generator\IR\Visitor\Analyzer\EnumReservedCaseNamesAnalyzerVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Analyzer\MixinsAnalyzerVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Analyzer\VirtualStructExtractorVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Generator\EnumGeneratorVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Generator\MixinGeneratorVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Generator\StructGeneratorVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Linker\MixinLinkerVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Service\TypeBuilder;
use Lsp\Protocol\Generator\MetaModel\Node\MetaModel;
use PhpParser\NodeTraverser;

final class IntermediateRepresentationFactory
{
    public function createFromMetaModel(MetaModel $model): IRDocument
    {
        $types = new TypeBuilder($model);

        $model = $this->analyze($model, $types);

        $document = $this->generate($model, $types);

        $this->link($model, $document);

        return $document;
    }

    private function link(MetaModel $model, IRDocument $document): void
    {
        (new NodeTraverser(
            new MixinLinkerVisitor($model, $document),
        ))
            ->traverse([$model]);
    }

    private function analyze(MetaModel $model, TypeBuilder $types): MetaModel
    {
        (new NodeTraverser(
            $extractor = new VirtualStructExtractorVisitor($model, $types),
            new EnumReservedCaseNamesAnalyzerVisitor($model, $types),
            new MixinsAnalyzerVisitor($model, $types),
        ))
            ->traverse([$model]);

        foreach ($extractor->getGeneratedStructures() as $generated) {
            $model->structures[] = $generated;
        }

        return $model;
    }

    private function generate(MetaModel $model, TypeBuilder $types): IRDocument
    {
        $document = new IRDocument();

        (new NodeTraverser(
            new EnumGeneratorVisitor($document, $model, $types),
            new MixinGeneratorVisitor($document, $model, $types),
            new StructGeneratorVisitor($document, $model, $types),
        ))
            ->traverse([$model]);

        return $document;
    }
}
