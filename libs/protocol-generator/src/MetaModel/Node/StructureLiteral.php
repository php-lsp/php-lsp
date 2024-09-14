<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node;

/**
 * Defines an unnamed structure of an object literal.
 */
final class StructureLiteral extends Definition
{
    /**
     * @param list<Property> $properties The properties.
     * @param non-empty-string|null $documentation An optional documentation.
     * @param non-empty-string|null $since Since when (release number) this
     *        structure is available. Is undefined if not known.
     * @param bool|null $proposed Whether this is a proposed structure. If
     *        omitted, the structure is final.
     * @param non-empty-string|null $deprecated Whether the literal is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
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
        return ['properties'];
    }

    /**
     * @param array{
     *     properties: list<array<array-key, mixed>>,
     *     documentation?: non-empty-string,
     *     since?: non-empty-string,
     *     proposed?: bool,
     *     deprecated?: non-empty-string,
     * } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            // @phpstan-ignore-next-line
            properties: \array_map(Property::fromArray(...), $data['properties'] ?? []),
            documentation: $data['documentation'] ?? null,
            since: $data['since'] ?? null,
            proposed: $data['proposed'] ?? null,
            deprecated: $data['deprecated'] ?? null,
        );
    }
}
