<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR;

use Lsp\Protocol\Generator\IR\Node\IRDocument;
use Lsp\Protocol\Generator\IR\Visitor\Analyzer\EnumReservedCaseNamesAnalyzerVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Analyzer\MixinsAnalyzerVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Extractor\ReplaceReferencesExtractorVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Extractor\VirtualStructExtractorVisitor;
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

        $this->analyze($model, $types);

        $model = $this->extract($model, $types);

        $document = $this->generate($model, $types);

        $this->link($model, $document);

        return $document;
    }

    /**
     * Link generated nodes to another one.
     */
    private function link(MetaModel $model, IRDocument $document): void
    {
        (new NodeTraverser(
            new MixinLinkerVisitor($model, $document),
        ))
            ->traverse([$model]);
    }

    /**
     * Extract virtual types from generated context to resulted meta model
     */
    private function extract(MetaModel $model, TypeBuilder $types): MetaModel
    {
        do {
            $generated = false;

            (new NodeTraverser(
                new ReplaceReferencesExtractorVisitor($model, $types),
                $extractor = new VirtualStructExtractorVisitor($model, $types)
            ))
                ->traverse([$model]);

            foreach ($extractor->getGeneratedStructures() as $struct) {
                $model->structures[] = $struct;
                $generated = true;
            }
        } while ($generated);

        return $model;
    }

    /**
     * Analyze source AST and add system tags
     */
    private function analyze(MetaModel $model, TypeBuilder $types): void
    {
        (new NodeTraverser(
            new EnumReservedCaseNamesAnalyzerVisitor($model, $types),
            new MixinsAnalyzerVisitor($model, $types),
        ))
            ->traverse([$model]);
    }

    /**
     * Generate intermediate representation nodes from source AST
     */
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
