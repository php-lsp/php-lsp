<?php

namespace Lsp\Protocol\Type;

/**
 * Represents information about programming constructs like variables, classes,
 * interfaces etc.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class SymbolInformation
{
    use BaseSymbolInformationMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(
        public readonly bool $deprecated,
        public readonly Location $location,
        string $name,
        SymbolKind $kind,
        array $tags,
        string $containerName,
    ) {
        $this->name = $name;

        $this->kind = $kind;

        $this->tags = $tags;

        $this->containerName = $containerName;
    }
}
