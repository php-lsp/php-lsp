<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output;

use Lsp\Protocol\Generator\MetaModel\Node\MetaModel;
use Lsp\Protocol\Generator\Output\Visitor\EnumNodeVisitor;
use Lsp\Protocol\Generator\Output\Visitor\ExtractStructLiteralNodeVisitor;
use Lsp\Protocol\Generator\Output\Visitor\MixinNodeVisitor;
use Lsp\Protocol\Generator\Output\Visitor\StandaloneStructNodeVisitor;
use Lsp\Protocol\Generator\Output\Visitor\StructInheritanceNodeVisitor;
use PhpParser\Node as PhpNodeInterface;
use PhpParser\NodeTraverser;

/**
 * Convert MetaModel AST nodes to the PHP AST.
 */
final class OutputTransformer
{
    public function __construct(
        private readonly MetaModel $model,
    ) {}

    /**
     * @param non-empty-string $namespace
     *
     * @return \ArrayObject<array-key, PhpNodeInterface>
     */
    private function transformMetaModel(string $namespace): \ArrayObject
    {
        $types = new \ArrayObject();

        // Normalize
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new StructInheritanceNodeVisitor());
        $traverser->addVisitor($extractor = new ExtractStructLiteralNodeVisitor());
        $traverser->traverse([$this->model]);

        // Load additional structures
        foreach ($extractor->getGeneratedStructures() as $structure) {
            $this->model->structures[] = $structure;
        }

        // Generate
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new EnumNodeVisitor($types, $namespace));
        $traverser->addVisitor(new StandaloneStructNodeVisitor($types, $namespace));
        $traverser->addVisitor(new MixinNodeVisitor($types, $namespace));
        $traverser->traverse([$this->model]);

        return $types;
    }

    /**
     * @api
     *
     * @param non-empty-string $namespace
     */
    public function forNamespace(string $namespace): OutputPrinter
    {
        return new OutputPrinter(
            namespace: $namespace,
            types: $this->transformMetaModel($namespace),
        );
    }
}
