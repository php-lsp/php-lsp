<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Visitor\Generator;

use Lsp\Protocol\Generator\IR\Node\IRDocument;
use Lsp\Protocol\Generator\IR\Node\IRPropertyStatement;
use Lsp\Protocol\Generator\IR\Visitor\Service\TypeBuilder;
use Lsp\Protocol\Generator\MetaModel\Node\MetaModel;
use Lsp\Protocol\Generator\MetaModel\Node\MetaProperty;
use PhpParser\NodeVisitorAbstract;

abstract class GeneratorVisitor extends NodeVisitorAbstract
{
    final public function __construct(
        protected readonly IRDocument $document,
        protected readonly MetaModel $model,
        protected readonly TypeBuilder $types,
    ) {}

    protected function createProperty(MetaProperty $node): IRPropertyStatement
    {
        $type = $this->types->build($node->type);

        if ($node->optional === true) {
            $type = $this->types->optional($type);
        }

        $property = new IRPropertyStatement(
            name: $node->name,
            type: $type,
        );

        $property->description = $node->documentation;
        $property->deprecated = $node->deprecated;
        $property->since = $node->since;
        $property->proposed = (bool) $node->proposed;

        return $property;
    }
}
