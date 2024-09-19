<?php

namespace Lsp\Protocol\Type;

/**
 * Represents programming constructs like variables, classes, interfaces etc.
 * that appear in a document. Document symbols can be hierarchical and they
 * have two ranges: one that encloses its definition and one that points to
 * its most interesting range, e.g. the range of an identifier.
 *
 * @generated
 */
final class DocumentSymbol
{
    /**
     * @param list<SymbolTag>|null $tags
     * @param list<DocumentSymbol>|null $children
     */
    final public function __construct(
        public readonly string $name,
        public readonly SymbolKind $kind,
        public readonly Range $range,
        public readonly Range $selectionRange,
        public readonly string|null $detail = null,
        public readonly array|null $tags = null,
        public readonly bool|null $deprecated = null,
        public readonly array|null $children = null,
    ) {}
}