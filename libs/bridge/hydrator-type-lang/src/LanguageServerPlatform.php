<?php

declare(strict_types=1);

namespace Lsp\Hydrator\TypeLang;

use Lsp\Hydrator\TypeLang\Type\MinifiedObjectTypeBuilder;
use TypeLang\Mapper\Platform\StandardPlatform;
use TypeLang\Mapper\Type\Builder\ObjectTypeBuilder;

final class LanguageServerPlatform extends StandardPlatform
{
    public function getName(): string
    {
        return 'lsp';
    }

    public function getTypes(): iterable
    {
        foreach (parent::getTypes() as $builder) {
            yield match (true) {
                $builder instanceof ObjectTypeBuilder => new MinifiedObjectTypeBuilder($builder),
                default => $builder,
            };
        }
    }
}
