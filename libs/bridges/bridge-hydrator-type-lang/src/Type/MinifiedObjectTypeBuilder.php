<?php

declare(strict_types=1);

namespace Lsp\Hydrator\Bridge\TypeLang\Type;

use TypeLang\Mapper\Type\Builder\Builder;
use TypeLang\Mapper\Type\Builder\ObjectTypeBuilder;
use TypeLang\Mapper\Type\Builder\TypeBuilderInterface;
use TypeLang\Mapper\Type\Repository\RepositoryInterface;
use TypeLang\Parser\Node\Stmt\NamedTypeNode;
use TypeLang\Parser\Node\Stmt\TypeStatement;

/**
 * @template-extends Builder<NamedTypeNode, MinifiedObjectType>
 */
final class MinifiedObjectTypeBuilder implements TypeBuilderInterface
{
    public function __construct(
        /**
         * @var ObjectTypeBuilder<object>
         */
        private readonly ObjectTypeBuilder $builder,
    ) {}

    public function isSupported(TypeStatement $statement): bool
    {
        return $this->builder->isSupported($statement);
    }

    public function build(TypeStatement $statement, RepositoryInterface $types): MinifiedObjectType
    {
        $type = $this->builder->build($statement, $types);

        return new MinifiedObjectType($type);
    }
}
