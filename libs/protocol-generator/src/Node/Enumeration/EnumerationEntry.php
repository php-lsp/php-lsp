<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Enumeration;

/**
 * Defines an enumeration entry.
 */
final class EnumerationEntry
{
    /**
     * @param non-empty-string $name The name of the enum item.
     * @param non-empty-string|int $value The value.
     * @param string|null $documentation An optional documentation.
     * @param non-empty-string|null $since Since when (release number) this
     *        enumeration entry is available. Is undefined if not known.
     * @param non-empty-string|null $proposed Whether this is a proposed
     *        enumeration entry. If omitted, the enumeration entry is final.
     * @param non-empty-string|null $deprecated Whether the enum entry is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
        public string $name,
        public string|int $value,
        public ?string $documentation,
        public ?string $since,
        public ?string $proposed,
        public ?string $deprecated,
    ) {}
}
