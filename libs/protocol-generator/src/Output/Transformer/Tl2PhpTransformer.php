<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Output\Transformer;

use PhpParser\Node as NodeInterface;
use PhpParser\Node\Identifier as PhpIdentifier;
use PhpParser\Node\IntersectionType as PhpIntersectionType;
use PhpParser\Node\Name as PhpName;
use PhpParser\Node\UnionType as PhpUnionType;
use TypeLang\Parser\Node\Identifier;
use TypeLang\Parser\Node\Literal\BoolLiteralNode;
use TypeLang\Parser\Node\Literal\IntLiteralNode;
use TypeLang\Parser\Node\Literal\NullLiteralNode;
use TypeLang\Parser\Node\Literal\StringLiteralNode;
use TypeLang\Parser\Node\Stmt\IntersectionTypeNode;
use TypeLang\Parser\Node\Stmt\NamedTypeNode;
use TypeLang\Parser\Node\Stmt\TypeStatement;
use TypeLang\Parser\Node\Stmt\UnionTypeNode;

final class Tl2PhpTransformer
{
    public static function make(TypeStatement $stmt): NodeInterface
    {
        return (new self())->transform($stmt);
    }

    public function transform(TypeStatement $stmt): NodeInterface
    {
        return match (true) {
            $stmt instanceof NamedTypeNode => $stmt->name->isSimple()
                ? $this->simplify($stmt->name->getFirstPart())
                : new PhpName($stmt->name->getPartsAsString()),
            $stmt instanceof UnionTypeNode => new PhpUnionType(
                // @phpstan-ignore-next-line
                types: \array_map($this->transform(...), $stmt->statements),
            ),
            $stmt instanceof IntersectionTypeNode => new PhpIntersectionType(
                // @phpstan-ignore-next-line
                types: \array_map($this->transform(...), $stmt->statements),
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

    private function simplify(Identifier $type): PhpIdentifier
    {
        return match (\strtolower($type->value)) {
            'non-empty-string' => new PhpIdentifier('string'),
            'list' => new PhpIdentifier('array'),
            default => new PhpIdentifier($type->value),
        };
    }
}
