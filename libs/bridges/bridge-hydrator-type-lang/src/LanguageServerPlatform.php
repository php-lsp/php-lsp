<?php

declare(strict_types=1);

namespace Lsp\Hydrator\Bridge\TypeLang;

use Lsp\Hydrator\Bridge\TypeLang\Type\ClassWithoutNullsTypeBuilder;
use Lsp\Hydrator\Bridge\TypeLang\Type\ObjectWithoutNullsTypeBuilder;
use TypeLang\Mapper\Platform\StandardPlatform;
use TypeLang\Mapper\Type;
use TypeLang\Mapper\Type\Builder;
use TypeLang\Mapper\Type\Builder\ClassTypeBuilder;
use TypeLang\Mapper\Type\Builder\ObjectTypeBuilder;

final class LanguageServerPlatform extends StandardPlatform
{
    public function getName(): string
    {
        return 'lsp';
    }

    public function getTypes(): iterable
    {
        yield new Builder\SimpleTypeBuilder('non-empty-string', Type\StringType::class);

        foreach (parent::getTypes() as $builder) {
            yield match (true) {
                $builder instanceof ObjectTypeBuilder => new ObjectWithoutNullsTypeBuilder($builder),
                $builder instanceof ClassTypeBuilder => new ClassWithoutNullsTypeBuilder($builder),
                default => $builder,
            };
        }
    }
}
