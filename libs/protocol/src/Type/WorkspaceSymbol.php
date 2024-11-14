<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A special workspace symbol that supports locations without a range.
 *
 * See also SymbolInformation.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-14
 */
final class WorkspaceSymbol
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
        /**
         * The location of the symbol. Whether a server is allowed to return a
         * location without a range depends on the client capability
         * `workspace.symbol.resolveSupport`.
         *
         * See SymbolInformation#location for more details.
         */
        public readonly Location|WorkspaceSymbolLocation $location,
        string $name,
        SymbolKind $kind,
        /**
         * A data entry field that is preserved on a workspace symbol between a
         * workspace symbol request and a workspace symbol resolve request.
         */
        public readonly mixed $data = null,
        ?array $tags = null,
        ?string $containerName = null,
    ) {
        $this->name = $name;
        $this->kind = $kind;
        $this->tags = $tags;
        $this->containerName = $containerName;
    }
}
