<?php

declare(strict_types=1);

namespace Lsp\Hydrator\TypeLang\Type;

use TypeLang\Mapper\Type\Builder\ObjectTypeBuilder;
use TypeLang\Mapper\Type\Builder\TypeBuilderInterface;
use TypeLang\Mapper\Type\Repository\RepositoryInterface;
use TypeLang\Parser\Node\Stmt\TypeStatement;

final class MinifiedObjectTypeBuilder implements TypeBuilderInterface
{
    public function __construct(
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
