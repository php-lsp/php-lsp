<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

use Lsp\Protocol\Generator\Node\Type\Type;
use Lsp\Protocol\Generator\Node\Type\TypeInterface;

/**
 * Defines the structure of an object literal.
 */
final class Structure extends Definition
{
    /**
     * @param non-empty-string $name The name of the structure.
     * @param list<TypeInterface>|null $extends Structures extended from. This
     *        structures form a polymorphic type hierarchy.
     * @param list<TypeInterface>|null $mixins Structures to mix in. The
     *        properties of these structures are `copied` into this structure.
     *        Mixins don't form a polymorphic type hierarchy in LSP.
     * @param list<Property> $properties The properties.
     * @param non-empty-string|null $documentation An optional documentation.
     * @param non-empty-string|null $since Since when (release number) this
     *        structure is available. Is undefined if not known.
     * @param bool|null $proposed Whether this is a proposed structure. If
     *        omitted, the structure is final.
     * @param non-empty-string|null $deprecated Whether the structure is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
        public string $name,
        public ?array $extends,
        public ?array $mixins,
        public array $properties,
        ?string $documentation,
        ?string $since,
        ?bool $proposed,
        ?string $deprecated,
    ) {
        parent::__construct(
            documentation: $documentation,
            since: $since,
            proposed: $proposed,
            deprecated: $deprecated,
        );
    }

    public function getSubNodeNames(): array
    {
        return ['extends', 'mixins', 'properties'];
    }

    /**
     * @param array{
     *     name: non-empty-string,
     *     extends?: list<array<array-key, mixed>>,
     *     mixins?: list<array<array-key, mixed>>,
     *     properties: list<array<array-key, mixed>>,
     *     documentation?: non-empty-string,
     *     since?: non-empty-string,
     *     proposed?: bool,
     *     deprecated?: non-empty-string
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            extends: isset($data['extends'])
                ? \array_map(Type::fromArray(...), $data['extends'])
                : null,
            mixins: isset($data['mixins'])
                ? \array_map(Type::fromArray(...), $data['mixins'])
                : null,
            // @phpstan-ignore-next-line
            properties: \array_map(Property::fromArray(...), $data['properties'] ?? []),
            documentation: $data['documentation'] ?? null,
            since: $data['since'] ?? null,
            proposed: $data['proposed'] ?? null,
            deprecated: $data['deprecated'] ?? null,
        );
    }
}
