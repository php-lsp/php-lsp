<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\Builder;

use Lsp\Protocol\Generator\IR\Node\IREnumCaseStatement;
use Lsp\Protocol\Generator\IR\Node\IREnumStatement;
use Lsp\Protocol\Generator\IR\Node\IRStatement;
use Lsp\Protocol\Generator\Output\DocBlock\TypedTag;
use PhpParser\Node\Identifier;
use PhpParser\Node\Identifier as PhpIdentifier;
use PhpParser\Node\Scalar;
use PhpParser\Node\Scalar\Int_ as PhpIntScalar;
use PhpParser\Node\Scalar\String_ as PhpStringScalar;
use PhpParser\Node\Stmt as PhpStatement;
use PhpParser\Node\Stmt\Enum_ as PhpEnumStatement;
use PhpParser\Node\Stmt\EnumCase as PhpEnumCaseStatement;

final class EnumBuilder extends Builder
{
    public function build(IRStatement $stmt): ?PhpStatement
    {
        if (!$stmt instanceof IREnumStatement) {
            return null;
        }

        $enum = $this->createEnum($stmt);

        foreach ($stmt->cases as $case) {
            $enum->stmts[] = $this->createEnumCase($stmt, $case);
        }

        return $enum;
    }

    private function createEnum(IREnumStatement $stmt): PhpEnumStatement
    {
        $enum = new PhpEnumStatement(new Identifier($stmt->name));
        $enum->scalarType = $this->getEnumType($stmt);
        $enum->stmts = [];

        $this->addEnumDocBlock($stmt, $enum);

        return $enum;
    }

    private function addEnumDocBlock(IREnumStatement $stmt, PhpEnumStatement $enum): void
    {
        $doc = $this->docblock->buildRootCommentFromStatement($stmt);

        if ($doc === null) {
            return;
        }

        $enum->setDocComment($doc);
    }

    private function createEnumCase(IREnumStatement $ctx, IREnumCaseStatement $stmt): PhpEnumCaseStatement
    {
        $case = new PhpEnumCaseStatement($stmt->name);
        $case->expr = $this->getEnumCaseValue($stmt);

        $this->addEnumCaseDocBlock($ctx, $stmt, $case);

        return $case;
    }

    private function addEnumCaseDocBlock(IREnumStatement $ctx, IREnumCaseStatement $stmt, PhpEnumCaseStatement $case): void
    {
        $description = $this->docblock->buildDocBlockFromStatement($stmt);

        if ($ctx->type !== null) {
            $description->addTag(new TypedTag('var', $ctx->type));
        }

        $doc = $this->docblock->buildCommentFromDocBlock($description, 1);

        if ($doc === null) {
            return;
        }

        $case->setDocComment($doc);
    }

    private function getEnumCaseValue(IREnumCaseStatement $stmt): Scalar
    {
        return match (true) {
            \is_string($stmt->value) => new PhpStringScalar($stmt->value),
            \is_int($stmt->value) => new PhpIntScalar($stmt->value),
            default => throw new \InvalidArgumentException(\sprintf(
                'Invalid enum case "%s" value of type "%s"',
                $stmt->name,
                \get_debug_type($stmt->value),
            )),
        };
    }

    private function getEnumType(IREnumStatement $stmt): ?PhpIdentifier
    {
        if ($stmt->type === null) {
            return null;
        }

        $result = $this->types->build($stmt->type);

        if (!$result instanceof PhpIdentifier) {
            throw new \LogicException('Enum does not support non-identifier types');
        }

        return $result;
    }
}
