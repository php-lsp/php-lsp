<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node;

use Lsp\Protocol\Generator\MetaModel\Node\Enumeration\MetaEnumerationEntry;
use Lsp\Protocol\Generator\MetaModel\Node\Enumeration\MetaEnumerationType;

/**
 * Defines an enumeration.
 */
final class Enumeration extends Definition
{
    /**
     * @param non-empty-string $name the name of the enumeration
     * @param MetaEnumerationType $type the type of the elements
     * @param list<MetaEnumerationEntry> $values the enum values
     * @param bool|null $supportsCustomValues Whether the enumeration supports
     *        custom values (e.g. values which are not part of the set defined
     *        in `values`). If omitted no custom values are supported.
     * @param non-empty-string|null $documentation an optional documentation
     * @param non-empty-string|null $since Since when (release number) this
     *        enumeration is available. Is undefined if not known.
     * @param bool|null $proposed Whether this is a proposed enumeration. If
     *        omitted, the enumeration is final.
     * @param non-empty-string|null $deprecated Whether the enumeration is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
        public string $name,
        public MetaEnumerationType $type,
        public array $values,
        public ?bool $supportsCustomValues,
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
     * @param array{
     *     name: non-empty-string,
     *     type: array<array-key, mixed>,
     *     values: list<array<array-key, mixed>>,
     *     supportsCustomValues?: bool,
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
            // @phpstan-ignore-next-line
            type: MetaEnumerationType::fromArray($data['type']),
            // @phpstan-ignore-next-line
            values: \array_map(MetaEnumerationEntry::fromArray(...), $data['values'] ?? []),
            supportsCustomValues: $data['supportsCustomValues'] ?? null,
            documentation: $data['documentation'] ?? null,
            since: $data['since'] ?? null,
            proposed: $data['proposed'] ?? null,
            deprecated: $data['deprecated'] ?? null,
        );
    }
}
