<?php

namespace Lsp\Protocol\Type;

/**
 * A special workspace symbol that supports locations without a range.
 *
 * See also SymbolInformation.
 *
 * @generated
 * @since 3.17.0
 */
final class WorkspaceSymbol
{
    use BaseSymbolInformationMixin;

    /**
     * @param list<SymbolTag>|null $tags
     */
    final public function __construct(
        public readonly Location|WorkspaceSymbolLocation $location,
        string $name,
        SymbolKind $kind,
        public readonly mixed $data = null,
        array|null $tags = null,
        string|null $containerName = null,
    ) {
            $this->name = $name;
    
            $this->kind = $kind;
    
            $this->tags = $tags;
    
            $this->containerName = $containerName;
    }
}