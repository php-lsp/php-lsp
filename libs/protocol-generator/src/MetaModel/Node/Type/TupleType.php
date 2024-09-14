<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node\Type;

/**
 * Represents a `tuple` type (e.g. `[integer, integer]`).
 */
final class TupleType extends Type
{
    /**
     * @param non-empty-list<TypeInterface> $items
     */
    public function __construct(
        public array $items,
    ) {
        parent::__construct();
    }

    public function getSubNodeNames(): array
    {
        return ['items'];
    }

    public static function fromArray(array $data): self
    {
        /** @var non-empty-list<TypeInterface> $types */
        // @phpstan-ignore-next-line
        $types = \array_map(Type::fromArray(...), $data['items'] ?? []);

        return new self($types);
    }
}
