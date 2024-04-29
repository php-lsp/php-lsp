<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Hydrator;

use Lsp\Protocol\Generator\Node\Type\AndType;
use Lsp\Protocol\Generator\Node\Type\ArrayType;
use Lsp\Protocol\Generator\Node\Type\BaseType;
use Lsp\Protocol\Generator\Node\Type\BooleanLiteralType;
use Lsp\Protocol\Generator\Node\Type\IntegerLiteralType;
use Lsp\Protocol\Generator\Node\Type\MapType;
use Lsp\Protocol\Generator\Node\Type\OrType;
use Lsp\Protocol\Generator\Node\Type\ReferenceType;
use Lsp\Protocol\Generator\Node\Type\StringLiteralType;
use Lsp\Protocol\Generator\Node\Type\StructureLiteralType;
use Lsp\Protocol\Generator\Node\Type\TupleType;
use Lsp\Protocol\Generator\Node\Type\TypeInterface;

/**
 * @template-extends Hydrator<TypeInterface, array<array-key, mixed>>
 */
final class TypeHydrator extends Hydrator
{
    public readonly StructureLiteralHydrator $structures;

    public function __construct()
    {
        $this->structures = new StructureLiteralHydrator(
            properties: new PropertyHydrator(
                types: $this,
            ),
        );
    }

    public function hydrate(array $data): TypeInterface
    {
        return match ($data['kind']) {
            'base' => BaseType::from($data['name']),
            // @phpstan-ignore-next-line
            'or' => new OrType($this->hydrateAll($data['items'] ?? [])),
            // @phpstan-ignore-next-line
            'and' => new AndType($this->hydrateAll($data['items'] ?? [])),
            'array' => new ArrayType($this->hydrate($data['element'])),
            'map' => new MapType(
                // @phpstan-ignore-next-line
                key: $this->hydrate($data['key']),
                value: $this->hydrate($data['value']),
            ),
            'reference' => new ReferenceType($data['name']),
            // @phpstan-ignore-next-line
            'tuple' => new TupleType($this->hydrateAll($data['items'] ?? [])),
            'literal' => new StructureLiteralType($this->structures->hydrate($data['value'])),
            'stringLiteral' => new StringLiteralType($data['value']),
            'integerLiteral' => new IntegerLiteralType($data['value']),
            'booleanLiteral' => new BooleanLiteralType($data['value']),
            default => throw new \InvalidArgumentException(\sprintf(
                'Invalid type kind "%s": %s',
                // @phpstan-ignore-next-line
                $data['kind'],
                \json_encode($data, \JSON_PRETTY_PRINT),
            )),
        };
    }
}
