<?php

namespace Lsp\Protocol\Type;

/**
 * A base for all symbol information.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class BaseSymbolInformation
{
    use BaseSymbolInformationMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<SymbolTag> $tags
     */
    public function __construct(
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
