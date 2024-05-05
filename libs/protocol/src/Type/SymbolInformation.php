<?php

namespace Lsp\Protocol\Type;

/**
 * Represents information about programming constructs like variables, classes,
 * interfaces etc.
 *
 * @generated
 */
final class SymbolInformation
{
    use BaseSymbolInformationMixin;

    /**
     * @param list<SymbolTag> $tags
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
