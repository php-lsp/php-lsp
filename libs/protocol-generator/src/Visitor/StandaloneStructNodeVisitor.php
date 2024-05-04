<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Visitor;

use Lsp\Protocol\Generator\DocBlock\DefinitionBuilder;
use Lsp\Protocol\Generator\DocBlock\StructParamsBuilder;
use Lsp\Protocol\Generator\Node\Structure;
use Lsp\Protocol\Generator\Transformer\Lsp2PhpTransformer;
use PhpParser\Modifiers;
use PhpParser\Node\Expr\Assign as PhpAssign;
use PhpParser\Node\Expr\PropertyFetch as PhpPropertyFetch;
use PhpParser\Node\Expr\Variable as PhpVariable;
use PhpParser\Node\Identifier as PhpIdentifier;
use PhpParser\Node\Param as PhpParam;
use PhpParser\Node\Stmt\Class_ as PhpClassStatement;
use PhpParser\Node\Stmt\ClassMethod as PhpClassMethod;
use PhpParser\Node\Stmt\Expression as PhpExpression;

final class StandaloneStructNodeVisitor extends StructLikeNodeVisitor
{
    protected function enterStruct(Structure $struct): void
    {
        if ($struct->isStandalone()) {
            $this->add($this->createStructure($struct));
        }
    }

    private function createStructure(Structure $struct): PhpClassStatement
    {
        $statement = new PhpClassStatement($struct->name);
        $statement->flags += Modifiers::FINAL;

        DefinitionBuilder::makeIfNotEmpty($struct, $statement->setDocComment(...));

        $this->applyMixins($statement, $struct);

        $statement->stmts[] = $this->createStandaloneTypeConstructor($struct);

        return $statement;
    }

    private function createStandaloneTypeConstructor(Structure $struct): PhpClassMethod
    {
        $method = new PhpClassMethod('__construct');
        $method->flags += Modifiers::FINAL | Modifiers::PUBLIC;
        $method->stmts = [];

        StructParamsBuilder::makeIfNotEmpty($this->context, $struct, $method->setDocComment(...));

        if ($this->context === null) {
            throw new \LogicException('Cannot create constructor without a context');
        }

        $inherited = [];
        foreach ($struct->getProperties($this->context) as $property) {
            // In case of a property already has been set
            if (\in_array($property->name, $inherited, true)) {
                continue;
            }

            $param = new PhpParam(new PhpVariable($property->name));
            $param->type = Lsp2PhpTransformer::make($this->context, $property->type);

            if ($property->isInherited()) {
                $method->stmts[] = new PhpExpression(
                    expr: new PhpAssign(
                        var: new PhpPropertyFetch(
                            var: new PhpVariable('this'),
                            name: new PhpIdentifier($property->name),
                        ),
                        expr: new PhpVariable($property->name),
                    ),
                );

                $inherited[] = $property->name;
            } else {
                $param->flags += Modifiers::PUBLIC | Modifiers::READONLY;
            }

            $method->params[$property->name] = $param;
        }

        return $method;
    }
}
