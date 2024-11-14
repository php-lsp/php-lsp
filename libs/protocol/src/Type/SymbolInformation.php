<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents information about programming constructs like variables, classes,
 * interfaces etc.
 *
 * @generated 2024-11-14
 */
final class SymbolInformation
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
         * The location of this symbol. The location's range is used by a tool
         * to reveal the location in the editor. If the symbol is selected in
         * the tool the range's start information is used to position the
         * cursor. So the range usually spans more than the actual symbol's name
         * and does normally include things like visibility modifiers.
         *
         * The range doesn't have to denote a node range in the sense of an
         * abstract syntax tree. It can therefore not be used to re-construct a
         * hierarchy of the symbols.
         */
        public readonly Location $location,
        string $name,
        SymbolKind $kind,
        /**
         * Indicates if this symbol is deprecated.
         *
         * @deprecated Use tags instead
         */
        public readonly ?bool $deprecated = null,
        ?array $tags = null,
        ?string $containerName = null,
    ) {
        $this->name = $name;
        $this->kind = $kind;
        $this->tags = $tags;
        $this->containerName = $containerName;
    }
}
