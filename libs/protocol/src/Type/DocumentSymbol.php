<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents programming constructs like variables, classes, interfaces etc.
 * that appear in a document. Document symbols can be hierarchical and they have
 * two ranges: one that encloses its definition and one that points to its most
 * interesting range, e.g. the range of an identifier.
 *
 * @generated 2024-11-14
 */
final class DocumentSymbol
{
    public function __construct(
        /**
         * The name of this symbol. Will be displayed in the user interface and
         * therefore must not be an empty string or a string only consisting of
         * white spaces.
         */
        public readonly string $name,
        /**
         * The kind of this symbol.
         */
        public readonly SymbolKind $kind,
        /**
         * The range enclosing this symbol not including leading/trailing
         * whitespace but everything else like comments. This information is
         * typically used to determine if the clients cursor is inside the
         * symbol to reveal in the symbol in the UI.
         */
        public readonly Range $range,
        /**
         * The range that should be selected and revealed when this symbol is
         * being picked, e.g the name of a function.
         * Must be contained by the `range`.
         */
        public readonly Range $selectionRange,
        /**
         * More detail for this symbol, e.g the signature of a function.
         */
        public readonly ?string $detail = null,
        /**
         * Tags for this document symbol.
         *
         * @since 3.16.0
         *
         * @var list<SymbolTag>|null
         */
        public readonly ?array $tags = null,
        /**
         * Indicates if this symbol is deprecated.
         *
         * @deprecated Use tags instead
         */
        public readonly ?bool $deprecated = null,
        /**
         * Children of this symbol, e.g. properties of a class.
         *
         * @var list<DocumentSymbol>|null
         */
        public readonly ?array $children = null,
    ) {}
}
