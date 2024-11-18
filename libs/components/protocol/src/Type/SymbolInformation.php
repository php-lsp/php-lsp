<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents information about programming constructs like variables, classes,
 * interfaces etc.
 */
final class SymbolInformation
{
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
        /**
         * The name of this symbol.
         */
        public readonly string $name,
        /**
         * The kind of this symbol.
         */
        public readonly SymbolKind $kind,
        /**
         * Indicates if this symbol is deprecated.
         *
         * @deprecated Use tags instead
         */
        public readonly ?bool $deprecated = null,
        /**
         * Tags for this symbol.
         *
         * @since 3.16.0
         *
         * @var list<SymbolTag>|null
         */
        public readonly ?array $tags = null,
        /**
         * The name of the symbol containing this symbol. This information is
         * for user interface purposes (e.g. to render a qualifier in the user
         * interface if necessary). It can't be used to re-infer a hierarchy for
         * the document symbols.
         */
        public readonly ?string $containerName = null,
    ) {}
}
