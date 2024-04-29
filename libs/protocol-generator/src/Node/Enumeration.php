<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

use Lsp\Protocol\Generator\Node\Enumeration\EnumerationEntry;
use Lsp\Protocol\Generator\Node\Enumeration\EnumerationType;

/**
 * Defines an enumeration.
 */
final class Enumeration
{
    /**
     * @param non-empty-string $name The name of the enumeration.
     * @param EnumerationType $type The type of the elements.
     * @param list<EnumerationEntry> $values The enum values.
     * @param bool|null $supportsCustomValues Whether the enumeration supports
     *        custom values (e.g. values which are not part of the set defined
     *        in `values`). If omitted no custom values are supported.
     * @param string|null $documentation An optional documentation.
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
        public EnumerationType $type,
        public array $values,
        public ?bool $supportsCustomValues,
        public ?string $documentation,
        public ?string $since,
        public ?bool $proposed,
        public ?string $deprecated,
    ) {}
}
