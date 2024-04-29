<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

use Lsp\Protocol\Generator\Node\Type\TypeInterface;

/**
 * Defines the structure of an object literal.
 */
final class Structure
{
    /**
     * @param non-empty-string $name The name of the structure.
     * @param list<TypeInterface>|null $extends Structures extended from. This
     *        structures form a polymorphic type hierarchy.
     * @param list<TypeInterface>|null $mixins Structures to mix in. The
     *        properties of these structures are `copied` into this structure.
     *        Mixins don't form a polymorphic type hierarchy in LSP.
     * @param list<Property> $properties The properties.
     * @param string|null $documentation An optional documentation.
     * @param non-empty-string|null $since Since when (release number) this
     *        structure is available. Is undefined if not known.
     * @param bool|null $proposed Whether this is a proposed structure. If
     *        omitted, the structure is final.
     * @param non-empty-string|null $deprecated Whether the structure is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
        public readonly string $name,
        public readonly ?array $extends,
        public readonly ?array $mixins,
        public readonly array $properties,
        public readonly ?string $documentation,
        public readonly ?string $since,
        public readonly ?bool $proposed,
        public readonly ?string $deprecated,
    ) {}
}
