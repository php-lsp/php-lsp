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
     * @param list<SymbolTag>|null $tags
     */
    final public function __construct(
        public readonly Location $location,
        string $name,
        SymbolKind $kind,
        public readonly bool|null $deprecated = null,
        array|null $tags = null,
        string|null $containerName = null,
    ) {
            $this->name = $name;
    
            $this->kind = $kind;
    
            $this->tags = $tags;
    
            $this->containerName = $containerName;
    }
}