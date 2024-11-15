<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\Builder;

use Lsp\Protocol\Generator\IR\Node\IRStatement;
use Lsp\Protocol\Generator\IR\Node\IRStructStatement;
use Lsp\Protocol\Generator\Output\DocBlock\DocBlock;
use Lsp\Protocol\Generator\Output\DocBlock\TypedTag;
use PhpParser\Modifiers;
use PhpParser\Node\Expr\Variable as PhpVariable;
use PhpParser\Node\Param as PhpParam;
use PhpParser\Node\Stmt as PhpStatement;
use PhpParser\Node\Stmt\Class_ as PhpClassStatement;
use PhpParser\Node\Stmt\ClassMethod as PhpClassMethod;

final class StructBuilder extends Builder
{
    public function build(IRStatement $stmt): ?PhpStatement
    {
        if (!$stmt instanceof IRStructStatement) {
            return null;
        }

        $struct = $this->createClass($stmt);
        $struct->stmts[] = $this->createConstructor($stmt);

        return $struct;
    }

    private function createConstructor(IRStructStatement $stmt): PhpClassMethod
    {
        $method = new PhpClassMethod('__construct');
        $method->flags |= Modifiers::PUBLIC;
        $method->stmts = [];

        $methodDescription = new DocBlock();

        $optional = $required = [];

        foreach ($stmt->getAllProperties() as $context => $property) {
            $param = new PhpParam(new PhpVariable($property->name));
            $param->type = $this->types->build($property->type);
            $param->default = $this->types->resolveDefaultValue($param->type);
            $param->flags |= Modifiers::PUBLIC | Modifiers::READONLY;

            $propertyDescription = $this->docblock->buildDocBlockFromStatement($property);

            if ($this->docblock->shouldPrintType($property->type)) {
                $propertyDescription->addTag(new TypedTag(
                    name: 'var',
                    type: $property->type,
                ));
            }

            $doc = $this->docblock->buildCommentFromDocBlock($propertyDescription, 2);

            if ($doc !== null) {
                $param->setDocComment($doc);
            }

            if ($param->default === null) {
                $required[$property->name] = $param;
            } else {
                $optional[$property->name] = $param;
            }
        }

        foreach ([...$required, ...$optional] as $name => $param) {
            $method->params[$name] = $param;
        }

        if (($doc = $this->docblock->buildCommentFromDocBlock($methodDescription, 1)) !== null) {
            $method->setDocComment($doc);
        }

        return $method;
    }

    private function createClass(IRStructStatement $stmt): PhpClassStatement
    {
        $class = new PhpClassStatement($stmt->name);
        $class->flags |= Modifiers::FINAL;
        $class->stmts = [];

        $this->addClassDocBlock($stmt, $class);

        return $class;
    }

    private function addClassDocBlock(IRStructStatement $stmt, PhpClassStatement $class): void
    {
        $doc = $this->docblock->buildRootCommentFromStatement($stmt);

        if ($doc === null) {
            return;
        }

        $class->setDocComment($doc);
    }
}
