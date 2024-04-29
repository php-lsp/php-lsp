<?php

declare(strict_types=1);

namespace Lsp\Protocol\Generator\Node\Type;

/**
 * Represents a reference to another type (e.g. `TextDocument`). This is either
 * a `Structure`, a `Enumeration` or a `TypeAlias` in the same meta model.
 */
final class ReferenceType implements TypeInterface
{
    /**
     * @param non-empty-string $name
     */
    public function __construct(
        public readonly string $name,
    ) {}
}
