<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

use Lsp\Protocol\Generator\Node\Node;

abstract class Type extends Node implements TypeInterface
{
    /**
     * @param array<array-key, mixed> $data
     */
    public static function fromArray(array $data): TypeInterface
    {
        assert(isset($data['kind']) && \is_string($data['kind']));

        return match ($data['kind']) {
            'base' => BaseType::fromArray($data),
            'or' => OrType::fromArray($data),
            'and' => AndType::fromArray($data),
            'tuple' => TupleType::fromArray($data),
            'array' => ArrayType::fromArray($data),
            'map' => MapType::fromArray($data),
            'reference' => ReferenceType::fromArray($data),
            'literal' => StructureLiteralType::fromArray($data),
            'stringLiteral' => StringLiteralType::fromArray($data),
            'integerLiteral' => IntegerLiteralType::fromArray($data),
            'booleanLiteral' => BooleanLiteralType::fromArray($data),
            default => throw new \InvalidArgumentException(
                message: \vsprintf('Invalid type kind "%s": %s', [
                    $data['kind'],
                    \json_encode($data, \JSON_PRETTY_PRINT),
                ],
            )),
        };
    }
}
