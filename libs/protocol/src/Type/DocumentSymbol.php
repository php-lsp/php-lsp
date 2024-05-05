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
     * @param list<SymbolTag> $tags
     * @param list<DocumentSymbol> $children
     */
    final public function __construct(
        public readonly string $name,
        public readonly string $detail,
        public readonly SymbolKind $kind,
        public readonly array $tags,
        public readonly bool $deprecated,
        public readonly Range $range,
        public readonly Range $selectionRange,
        public readonly array $children,
    ) {}
}
