<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\Visitor;

use Lsp\Protocol\Generator\MetaModel\Node\Property;
use Lsp\Protocol\Generator\MetaModel\Node\Structure;
use Lsp\Protocol\Generator\MetaModel\Node\StructureLiteral;
use Lsp\Protocol\Generator\MetaModel\Node\Type\ReferenceType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\StructureLiteralType;
use PhpParser\Node;

final class ExtractStructLiteralNodeVisitor extends Visitor
{
    /**
     * @var list<Structure>
     */
    private array $generated = [];

    private ?Structure $struct = null;

    private ?Property $property = null;

    /**
     * @return list<Structure>
     */
    public function getGeneratedStructures(): array
    {
        return $this->generated;
    }

    public function beforeTraverse(array $nodes): mixed
    {
        $this->generated = [];

        return null;
    }

    public function enterNode(Node $node): ?ReferenceType
    {
        if ($node instanceof Property) {
            $this->property = $node;
            return null;
        }

        if ($node instanceof Structure) {
            $this->struct = $node;
            return null;
        }

        if ($node instanceof StructureLiteralType && $this->struct !== null && $this->property !== null) {
            $this->generated[] = $struct = $this->createStruct($node->value);

            return new ReferenceType($struct->name);
        }

        return null;
    }

    private function createStruct(StructureLiteral $struct): Structure
    {
        assert($this->struct !== null);
        assert($this->property !== null);

        $result = new Structure(
            name: $this->struct->name . \ucfirst($this->property->name),
            extends: null,
            mixins: null,
            properties: $struct->properties,
            documentation: $struct->documentation,
            since: $struct->since,
            proposed: $struct->proposed,
            deprecated: $struct->deprecated,
        );

        $result->setAttribute('internal', $this->struct->name);

        return $result;
    }

    public function leaveNode(Node $node): mixed
    {
        if ($node instanceof Structure) {
            $this->struct = null;
        }

        if ($node instanceof Property) {
            $this->property = null;
        }

        return null;
    }
}
