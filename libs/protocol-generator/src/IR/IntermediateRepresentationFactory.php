<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR;

use Lsp\Protocol\Generator\IR\Node\IRDocument;
use Lsp\Protocol\Generator\IR\Visitor\Analyzer\AnalyzerVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Analyzer\EnumReservedCaseNamesAnalyzerVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Analyzer\MixinsAnalyzerVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Generator\EnumGeneratorVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Generator\GeneratorVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Generator\MixinGeneratorVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Generator\StructGeneratorVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Linker\LinkerVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Linker\MixinLinkerVisitor;
use Lsp\Protocol\Generator\IR\Visitor\Service\TypeBuilder;
use Lsp\Protocol\Generator\MetaModel\Node\MetaModel;
use PhpParser\NodeTraverser;

final class IntermediateRepresentationFactory
{
    /**
     * @return iterable<array-key, class-string<GeneratorVisitor>>
     */
    private function getGeneratorVisitors(): iterable
    {
        yield EnumGeneratorVisitor::class;
        yield MixinGeneratorVisitor::class;
        yield StructGeneratorVisitor::class;
    }

    /**
     * @return iterable<array-key, class-string<AnalyzerVisitor>>
     */
    private function getAnalyzerVisitors(): iterable
    {
        yield EnumReservedCaseNamesAnalyzerVisitor::class;
        yield MixinsAnalyzerVisitor::class;
    }

    /**
     * @return iterable<array-key, class-string<LinkerVisitor>>
     */
    private function getLinkerVisitors(): iterable
    {
        yield MixinLinkerVisitor::class;
    }

    public function createFromMetaModel(MetaModel $model): IRDocument
    {
        $types = new TypeBuilder($model);

        $this->analyze($model, $types);

        $document = $this->generate($model, $types);

        $this->link($model, $document);

        return $document;
    }

    private function link(MetaModel $model, IRDocument $document): void
    {
        $traverser = new NodeTraverser();

        foreach ($this->getLinkerVisitors() as $visitor) {
            $traverser->addVisitor(new $visitor(
                model: $model,
                document: $document,
            ));
        }

        $traverser->traverse([$model]);
    }

    private function analyze(MetaModel $model, TypeBuilder $types): void
    {
        $traverser = new NodeTraverser();

        foreach ($this->getAnalyzerVisitors() as $visitor) {
            $traverser->addVisitor(new $visitor(
                model: $model,
                types: $types,
            ));
        }

        $traverser->traverse([$model]);
    }

    private function generate(MetaModel $model, TypeBuilder $types): IRDocument
    {
        $document = new IRDocument();
        $traverser = new NodeTraverser();

        foreach ($this->getGeneratorVisitors() as $visitor) {
            $traverser->addVisitor(new $visitor(
                document: $document,
                model: $model,
                types: $types,
            ));
        }

        $traverser->traverse([$model]);

        return $document;
    }
}
