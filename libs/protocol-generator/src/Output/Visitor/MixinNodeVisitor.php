<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\Visitor;

use Lsp\Protocol\Generator\MetaModel\Node\Property;
use Lsp\Protocol\Generator\MetaModel\Node\Structure;
use Lsp\Protocol\Generator\Output\DocBlock\DefinitionBuilder;
use Lsp\Protocol\Generator\Output\DocBlock\PropertyBuilder;
use Lsp\Protocol\Generator\Output\DocBlock\StructParamsBuilder;
use Lsp\Protocol\Generator\Output\Transformer\Lsp2PhpTransformer;
use PhpParser\Modifiers;
use PhpParser\Node\Expr\Assign as PhpAssign;
use PhpParser\Node\Expr\PropertyFetch as PhpPropertyFetch;
use PhpParser\Node\Expr\Variable as PhpVariable;
use PhpParser\Node\Identifier as PhpIdentifier;
use PhpParser\Node\Name;
use PhpParser\Node\Param as PhpParam;
use PhpParser\Node\PropertyItem;
use PhpParser\Node\Stmt\Class_ as PhpClassStatement;
use PhpParser\Node\Stmt\ClassMethod as PhpClassMethod;
use PhpParser\Node\Stmt\Expression as PhpExpression;
use PhpParser\Node\Stmt\Property as PhpPropertyStatement;
use PhpParser\Node\Stmt\Trait_ as PhpTraitStatement;
use PhpParser\Node\Stmt\Use_ as PhpUseStatement;
use PhpParser\Node\UseItem;

final class MixinNodeVisitor extends StructLikeNodeVisitor
{
    protected function enterStruct(Structure $struct): void
    {
        if (!$struct->isStandalone()) {
            $this->add($this->createStructure($struct));
            $this->add($this->createMixin($struct));
        }
    }

    private function createMixin(Structure $struct): PhpTraitStatement
    {
        $statement = new PhpTraitStatement($struct->name . 'Mixin');

        $this->applyMixins($statement, $struct);

        foreach ($struct->properties as $property) {
            $statement->stmts[] = $this->createProperty($property);
        }

        return $statement;
    }

    private function createProperty(Property $property): PhpPropertyStatement
    {
        $statement = new PhpPropertyStatement(Modifiers::PUBLIC | Modifiers::READONLY, [
            new PropertyItem($property->name),
        ]);

        if ($this->context === null) {
            throw new \LogicException('Cannot create property without a context');
        }

        PropertyBuilder::makeIfNotEmpty($this->context, $property, $statement->setDocComment(...));

        // @phpstan-ignore-next-line
        $statement->type = Lsp2PhpTransformer::make($this->context, $property->type);

        return $statement;
    }

    private function createStructure(Structure $struct): PhpClassStatement
    {
        $statement = new PhpClassStatement($struct->name);

        if ($struct->isMixin()) {
            $statement->flags += Modifiers::ABSTRACT;
        }

        DefinitionBuilder::makeIfNotEmpty($struct, $statement->setDocComment(...));

        $statement->stmts[] = new PhpUseStatement([
            new UseItem(new Name(
                name: $struct->name . 'Mixin',
            )),
        ]);

        $statement->stmts[] = $this->createMixinTypeConstructor($struct);

        return $statement;
    }

    private function createMixinTypeConstructor(Structure $struct): PhpClassMethod
    {
        $method = new PhpClassMethod('__construct');
        $method->flags += Modifiers::PUBLIC;
        $method->stmts = [];

        if ($this->context === null) {
            throw new \LogicException('Cannot create constructor without a context');
        }

        StructParamsBuilder::makeIfNotEmpty($this->context, $struct, $method->setDocComment(...));

        foreach ($struct->getProperties($this->context) as $property) {
            // In case of property already has been defined
            if (isset($method->params[$property->name])) {
                continue;
            }

            $param = new PhpParam(new PhpVariable($property->name));
            // @phpstan-ignore-next-line
            $param->type = Lsp2PhpTransformer::make($this->context, $property->type);

            $method->stmts[] = new PhpExpression(
                expr: new PhpAssign(
                    var: new PhpPropertyFetch(
                        var: new PhpVariable('this'),
                        name: new PhpIdentifier($property->name),
                    ),
                    expr: new PhpVariable($property->name),
                ),
            );

            $method->params[$property->name] = $param;
        }

        return $method;
    }
}
