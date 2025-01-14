<?php

declare(strict_types=1);

namespace Lsp\Hydrator\Bridge\TypeLang\Type;

use TypeLang\Mapper\Runtime\Parser\TypeParserInterface;
use TypeLang\Mapper\Runtime\Repository\TypeRepositoryInterface;
use TypeLang\Mapper\Type\Builder\ClassTypeBuilder;
use TypeLang\Mapper\Type\Builder\TypeBuilderInterface;
use TypeLang\Parser\Node\Stmt\NamedTypeNode;
use TypeLang\Parser\Node\Stmt\TypeStatement;

/**
 * @template-implements TypeBuilderInterface<NamedTypeNode, NonNullCompositeType>
 */
final class ClassWithoutNullsTypeBuilder implements TypeBuilderInterface
{
    public function __construct(
        private readonly ClassTypeBuilder $builder,
    ) {}

    public function isSupported(TypeStatement $statement): bool
    {
        return $this->builder->isSupported($statement);
    }

    public function build(
        TypeStatement $statement,
        TypeRepositoryInterface $types,
        TypeParserInterface $parser,
    ): NonNullCompositeType {
        $type = $this->builder->build($statement, $types, $parser);

        return new NonNullCompositeType($type);
    }
}
