<?php

namespace Lsp\Protocol\Type;

/**
 * A base for all symbol information.
 *
 * @generated
 */
class BaseSymbolInformation
{
    use BaseSymbolInformationMixin;

    /**
     * @param list<SymbolTag>|null $tags
     */
    public function __construct(
        string $name,
        SymbolKind $kind,
        array|null $tags,
        string|null $containerName,
    ) {
            $this->name = $name;
    
            $this->kind = $kind;
    
            $this->tags = $tags;
    
            $this->containerName = $containerName;
    }
}