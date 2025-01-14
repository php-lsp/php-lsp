<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\Builder\Service;

use PhpParser\Node\ComplexType as PhpComplexType;
use PhpParser\Node\Expr\Array_ as PhpArray;
use PhpParser\Node\Expr as PhpExpr;
use PhpParser\Node\Expr\ConstFetch as PhpConstFetch;
use PhpParser\Node\Identifier as PhpIdentifier;
use PhpParser\Node\IntersectionType as PhpIntersectionType;
use PhpParser\Node\Name as PhpName;
use PhpParser\Node\UnionType as PhpUnionType;
use PhpParser\NodeAbstract as PhpNodeAbstract;
use TypeLang\Parser\Node\Identifier;
use TypeLang\Parser\Node\Literal\BoolLiteralNode;
use TypeLang\Parser\Node\Literal\IntLiteralNode;
use TypeLang\Parser\Node\Literal\NullLiteralNode;
use TypeLang\Parser\Node\Literal\StringLiteralNode;
use TypeLang\Parser\Node\Stmt\IntersectionTypeNode;
use TypeLang\Parser\Node\Stmt\NamedTypeNode;
use TypeLang\Parser\Node\Stmt\TypeStatement;
use TypeLang\Parser\Node\Stmt\UnionTypeNode;

final class PhpTypeBuilder
{
    public function resolveDefaultValue(PhpNodeAbstract $type, TypeStatement $stmt): ?PhpExpr
    {
        if ($this->supportsNull($type)) {
            return new PhpConstFetch(new PhpName('null'));
        }

        if ($this->supportsArray($type, $stmt)) {
            return new PhpArray();
        }

        return null;
    }

    private function supportsNull(PhpNodeAbstract $type): bool
    {
        if ($this->isNull($type) || $this->isMixed($type)) {
            return true;
        }

        if (!$type instanceof PhpUnionType) {
            return false;
        }

        foreach ($type->types as $child) {
            if ($this->isNull($child) || $this->isMixed($child)) {
                return true;
            }
        }

        return false;
    }

    private function isNull(PhpNodeAbstract $type): bool
    {
        return ($type instanceof PhpIdentifier || $type instanceof PhpName)
            && $type->toLowerString() === 'null';
    }

    private function isMixed(PhpNodeAbstract $type): bool
    {
        return ($type instanceof PhpIdentifier || $type instanceof PhpName)
            && $type->toLowerString() === 'mixed';
    }

    private function supportsArray(PhpNodeAbstract $type, TypeStatement $stmt): bool
    {
        if ($this->isArray($type)) {
            return $stmt instanceof NamedTypeNode
                && $stmt->fields === null;
        }

        if (!$type instanceof PhpUnionType || !$stmt instanceof UnionTypeNode) {
            return false;
        }

        foreach ($stmt->statements as $child) {
            if ($child instanceof NamedTypeNode && $child->fields !== null) {
                return false;
            }
        }

        foreach ($type->types as $child) {
            if ($this->isArray($child)) {
                return true;
            }
        }

        return false;
    }

    private function isArray(PhpNodeAbstract $type): bool
    {
        return ($type instanceof PhpIdentifier || $type instanceof PhpName)
            && $type->toLowerString() === 'array';
    }

    public function build(TypeStatement $stmt): PhpIdentifier|PhpName|PhpComplexType
    {
        return match (true) {
            $stmt instanceof NamedTypeNode => $stmt->name->isSimple()
                ? $this->simplify($stmt->name->getFirstPart())
                : new PhpName($stmt->name->getPartsAsString()),
            $stmt instanceof UnionTypeNode => new PhpUnionType(
                // @phpstan-ignore-next-line
                types: $this->sortScalars(
                    types: \array_map($this->build(...), $stmt->statements),
                ),
            ),
            $stmt instanceof IntersectionTypeNode => new PhpIntersectionType(
                // @phpstan-ignore-next-line
                types: \array_map($this->build(...), $stmt->statements),
            ),
            $stmt instanceof StringLiteralNode => new PhpIdentifier('string'),
            $stmt instanceof IntLiteralNode => new PhpIdentifier('int'),
            $stmt instanceof BoolLiteralNode => new PhpIdentifier('bool'),
            $stmt instanceof NullLiteralNode => new PhpIdentifier('null'),
            default => throw new \InvalidArgumentException(
                'Unsupported type of class ' . $stmt::class,
            ),
        };
    }

    /**
     * @param array<array-key, mixed> $types
     *
     * @return array<array-key, mixed>
     */
    private function sortScalars(array $types): array
    {
        \uasort($types, function (mixed $a, mixed $b): int {
            return $this->getPriority($b) <=> $this->getPriority($a);
        });

        return $types;
    }

    private function getPriority(mixed $identifier): int
    {
        if ($identifier instanceof PhpIdentifier || $identifier instanceof PhpName) {
            $isBuiltin = (new Identifier($identifier->toLowerString()))
                ->isBuiltin();

            return $isBuiltin ? 0 : 1;
        }

        return 1;
    }

    private function simplify(Identifier $type): PhpIdentifier
    {
        return match (\strtolower($type->value)) {
            'non-empty-string' => new PhpIdentifier('string'),
            'list' => new PhpIdentifier('array'),
            default => new PhpIdentifier($type->value),
        };
    }
}
