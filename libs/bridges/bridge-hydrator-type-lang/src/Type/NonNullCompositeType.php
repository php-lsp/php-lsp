<?php

declare(strict_types=1);

namespace Lsp\Hydrator\Bridge\TypeLang\Type;

use TypeLang\Mapper\Runtime\Context;
use TypeLang\Mapper\Type\TypeInterface;

final class NonNullCompositeType implements TypeInterface
{
    public function __construct(
        private readonly TypeInterface $type,
    ) {}

    public function match(mixed $value, Context $context): bool
    {
        return $this->type->match($value, $context);
    }

    public function cast(mixed $value, Context $context): mixed
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
