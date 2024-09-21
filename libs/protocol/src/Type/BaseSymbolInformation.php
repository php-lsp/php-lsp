<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A base for all symbol information.
 *
 * @generated 2024-09-21
 */
final class BaseSymbolInformation
{
    use BaseSymbolInformationMixin;

    /**
     * @param string $name the name of this symbol
     * @param SymbolKind $kind the kind of this symbol
     * @param list<SymbolTag>|null $tags tags for this symbol
     * @param string|null $containerName The name of the symbol containing this
     *        symbol. This information is for user interface purposes (e.g. to render a
     *        qualifier in the user interface if necessary). It can't be used to
     *        re-infer a hierarchy for the document symbols.
     */
    public function __construct(
        string $name,
        SymbolKind $kind,
        ?array $tags = null,
        ?string $containerName = null,
    ) {
        $this->name = $name;
        $this->kind = $kind;
        $this->tags = $tags;
        $this->containerName = $containerName;
    }
}
