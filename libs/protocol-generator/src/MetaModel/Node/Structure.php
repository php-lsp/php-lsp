<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node;

use Lsp\Protocol\Generator\MetaModel\Node\Type\ReferenceType;
use Lsp\Protocol\Generator\MetaModel\Node\Type\Type;
use Lsp\Protocol\Generator\MetaModel\Node\Type\TypeInterface;

/**
 * Defines the structure of an object literal.
 */
final class Structure extends Definition
{
    /**
     * @var non-empty-string
     */
    private const ATTR_USED_AS_MIXIN = 'used_as_mixin';

    /**
     * @var non-empty-string
     */
    private const ATTR_USED_AS_PARENT = 'used_as_parent';

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

    /**
     * @return iterable<array-key, Property>
     */
    public function getProperties(MetaModel $ctx): iterable
    {
        yield from $this->properties;

        foreach ([...($this->extends ?? []), ...($this->mixins ?? [])] as $ref) {
            if (!$ref instanceof ReferenceType) {
                continue;
            }

            $struct = $ctx->findReference($ref);

            if (!$struct instanceof Structure) {
                continue;
            }

            foreach ($struct->getProperties($ctx) as $property) {
                yield (clone $property)->markAsInherited();
            }
        }
    }

    public function isStandalone(): bool
    {
        return !$this->isMixin() && !$this->isParent();
    }

    public function markAsMixin(): self
    {
        $this->setAttribute(self::ATTR_USED_AS_MIXIN, true);

        return $this;
    }

    public function isMixin(): bool
    {
        return (bool) $this->getAttribute(self::ATTR_USED_AS_MIXIN, false);
    }

    public function markAsParent(): self
    {
        $this->setAttribute(self::ATTR_USED_AS_PARENT, true);

        return $this;
    }

    public function isParent(): bool
    {
        return (bool) $this->getAttribute(self::ATTR_USED_AS_PARENT, false);
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
