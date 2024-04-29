<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

/**
 * Defines an unnamed structure of an object literal.
 */
final class StructureLiteral
{
    /**
     * @param list<Property> $properties The properties.
     * @param string|null $documentation An optional documentation.
     * @param non-empty-string|null $since Since when (release number) this
     *        structure is available. Is undefined if not known.
     * @param bool|null $proposed Whether this is a proposed structure. If
     *        omitted, the structure is final.
     * @param non-empty-string|null $deprecated Whether the literal is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
        public readonly array $properties,
        public readonly ?string $documentation,
        public readonly ?string $since,
        public readonly ?bool $proposed,
        public readonly ?string $deprecated,
    ) {}
}
