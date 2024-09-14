<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\MetaModel\Node\Enumeration;

use Lsp\Protocol\Generator\MetaModel\Node\Definition;

/**
 * Defines an enumeration entry.
 */
final class EnumerationEntry extends Definition
{
    /**
     * @param non-empty-string $name the name of the enum item
     * @param non-empty-string|int $value the value
     * @param non-empty-string|null $documentation an optional documentation
     * @param non-empty-string|null $since Since when (release number) this
     *        enumeration entry is available. Is undefined if not known.
     * @param bool|null $proposed Whether this is a proposed enumeration entry.
     *        If omitted, the enumeration entry is final.
     * @param non-empty-string|null $deprecated Whether the enum entry is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
        public string $name,
        public string|int $value,
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
     *     value: non-empty-string|int,
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
            value: $data['value'],
            documentation: $data['documentation'] ?? null,
            since: $data['since'] ?? null,
            proposed: $data['proposed'] ?? null,
            deprecated: $data['deprecated'] ?? null,
        );
    }
}
