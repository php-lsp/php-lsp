<?php

declare(strict_types=1);

namespace Lsp\Hydrator\TypeLang\Type;

use TypeLang\Mapper\Runtime\Context\LocalContext;
use TypeLang\Mapper\Type\ObjectType;
use TypeLang\Mapper\Type\TypeInterface;

final class MinifiedObjectType implements TypeInterface
{
    public function __construct(
        private readonly ObjectType $type,
    ) {}

    public function match(mixed $value, LocalContext $context): bool
    {
        return $this->type->match($value, $context);
    }

    public function cast(mixed $value, LocalContext $context): mixed
    {
        if ($context->isDenormalization()) {
            return $this->type->cast($value, $context);
        }

        $result = $this->type->cast($value, $context);

        if (\is_array($result)) {
            $minified = [];

            foreach ($result as $key => $inner) {
                if ($inner === null) {
                    continue;
                }

                $minified[$key] = $inner;
            }

            $result = $minified;
        }

        return $result;
    }
}
