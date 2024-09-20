<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node;

use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaReferenceType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\MetaType;

/**
 * Defines the structure of an object literal.
 */
final class MetaStructure extends Definition
{
    /**
     * @param non-empty-string $name the name of the structure
     * @param list<MetaReferenceType> $extends Structures extended from. This
     *        structures form a polymorphic type hierarchy.
     * @param list<MetaReferenceType> $mixins Structures to mix in. The
     *        properties of these structures are `copied` into this structure.
     *        Mixins don't form a polymorphic type hierarchy in LSP.
     * @param list<MetaProperty> $properties the properties
     * @param non-empty-string|null $documentation an optional documentation
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
        public array $extends,
        public array $mixins,
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
            extends: self::createReferencesFromArray($data, 'extends'),
            mixins: self::createReferencesFromArray($data, 'mixins'),
            // @phpstan-ignore-next-line
            properties: \array_map(MetaProperty::fromArray(...), $data['properties'] ?? []),
            documentation: $data['documentation'] ?? null,
            since: $data['since'] ?? null,
            proposed: $data['proposed'] ?? null,
            deprecated: $data['deprecated'] ?? null,
        );
    }

    /**
     * @param array<array-key, mixed> $data
     * @param non-empty-string $key
     *
     * @return list<MetaReferenceType>
     */
    private static function createReferencesFromArray(array $data, string $key): array
    {
        $result = [];

        foreach ((array) ($data[$key] ?? []) as $type) {
            $reference = MetaType::fromArray((array) $type);

            if (!$reference instanceof MetaReferenceType) {
                throw new \InvalidArgumentException(\sprintf(
                    'Invalid reference type %s',
                    $reference::class,
                ));
            }

            $result[] = $reference;
        }

        return $result;
    }
}
