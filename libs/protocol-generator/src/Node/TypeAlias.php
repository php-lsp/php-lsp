<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

use Lsp\Protocol\Generator\Node\Type\TypeInterface;

/**
 * Defines a type alias. (e.g. `type Definition = Location | LocationLink`).
 */
final class TypeAlias
{
    /**
     * @param non-empty-string $name The name of the type alias.
     * @param TypeInterface $type The aliased type.
     * @param string|null $documentation An optional documentation.
     * @param non-empty-string|null $since Since when (release number) this
     *        structure is available. Is undefined if not known.
     * @param bool|null $proposed Whether this is a proposed type alias.
     *        If omitted, the type alias is final.
     * @param non-empty-string|null $deprecated Whether the type alias is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
        public readonly string $name,
        public readonly TypeInterface $type,
        public readonly ?string $documentation,
        public readonly ?string $since,
        public readonly ?bool $proposed,
        public readonly ?string $deprecated,
    ) {}
}
