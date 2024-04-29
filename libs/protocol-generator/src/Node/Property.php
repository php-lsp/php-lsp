<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node;

use Lsp\Protocol\Generator\Node\Type\TypeInterface;

/**
 * Represents an object property.
 */
final class Property
{
    /**
     * @param non-empty-string $name The property name.
     * @param TypeInterface $type The type of the property.
     * @param bool|null $optional Whether the property is optional. If omitted,
     *        the property is mandatory.
     * @param string|null $documentation An optional documentation.
     * @param non-empty-string|null $since Since when (release number) this
     *        property is available. Is undefined if not known.
     * @param bool|null $proposed Whether this is a proposed property. If
     *        omitted, the structure is final.
     * @param non-empty-string|null $deprecated Whether the property is
     *        deprecated or not. If deprecated the property contains the
     *        deprecation message.
     */
    public function __construct(
        public readonly string $name,
        public readonly TypeInterface $type,
        public readonly ?bool $optional,
        public readonly ?string $documentation,
        public readonly ?string $since,
        public readonly ?bool $proposed,
        public readonly ?string $deprecated,
    ) {}
}
