<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node\Type;

use Lsp\Protocol\Generator\MetaModel\Node\MetaNode;

abstract class MetaType extends MetaNode implements MetaTypeInterface
{
    /**
     * @param array<array-key, mixed> $data
     */
    public static function fromArray(array $data): MetaTypeInterface
    {
        assert(isset($data['kind']) && \is_string($data['kind']));

        return match ($data['kind']) {
            'base' => MetaBaseType::fromArray($data),
            'or' => MetaOrType::fromArray($data),
            'and' => MetaAndType::fromArray($data),
            'tuple' => MetaTupleType::fromArray($data),
            'array' => MetaArrayType::fromArray($data),
            'map' => MetaMapType::fromArray($data),
            'reference' => MetaReferenceType::fromArray($data),
            'literal' => MetaStructureLiteralType::fromArray($data),
            'stringLiteral' => MetaStringLiteralType::fromArray($data),
            'integerLiteral' => MetaIntegerLiteralType::fromArray($data),
            'booleanLiteral' => MetaBooleanLiteralType::fromArray($data),
            default => throw new \InvalidArgumentException(
                message: \vsprintf(
                    'Invalid type kind "%s": %s',
                    [
                        $data['kind'],
                        \json_encode($data, \JSON_PRETTY_PRINT),
                    ],
                ),
            ),
        };
    }
}
