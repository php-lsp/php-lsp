<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\IR\Visitor\Extractor;

use Lsp\Protocol\Generator\MetaModel\Node\MetaProperty;
use Lsp\Protocol\Generator\MetaModel\Node\MetaStructure;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaReferenceType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaStructureLiteralType;
use PhpParser\Node;

final class VirtualStructExtractorVisitor extends ExtractorVisitor
{
    private ?MetaStructure $struct = null;

    private ?MetaProperty $property = null;

    /**
     * @var list<MetaStructure>
     */
    private array $generated = [];

    /**
     * @return list<MetaStructure>
     */
    public function getGeneratedStructures(): array
    {
        $result = $this->generated;

        $this->generated = [];

        return $result;
    }

    public function enterNode(Node $node): mixed
    {
        if ($node instanceof MetaStructure) {
            $this->struct = $node;

            return null;
        }

        if ($node instanceof MetaProperty) {
            $this->property = $node;

            return null;
        }

        if (!$node instanceof MetaStructureLiteralType
            || $this->struct === null
            || $this->property === null) {
            return null;
        }

        $this->generated[] = $struct = new MetaStructure(
            name: $this->struct->name . \ucfirst($this->property->name),
            extends: [],
            mixins: [],
            properties: $node->value->properties,
            documentation: $node->value->documentation,
            since: $node->value->since,
            proposed: $node->value->proposed,
            deprecated: $node->value->deprecated,
        );

        return new MetaReferenceType($struct->name);
    }

    public function leaveNode(Node $node): mixed
    {
        if ($node instanceof MetaStructure) {
            $this->struct = null;
        }

        if ($node instanceof MetaProperty) {
            $this->property = null;
        }

        return null;
    }
}
