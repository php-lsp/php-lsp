<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * @since 3.17.0
 */
final class TypeHierarchyItem
{
    public function __construct(
        /**
         * The name of this item.
         */
        public readonly string $name,
        /**
         * The kind of this item.
         */
        public readonly SymbolKind $kind,
        /**
         * The resource identifier of this item.
         *
         * @var non-empty-string
         */
        public readonly string $uri,
        /**
         * The range enclosing this symbol not including leading/trailing
         * whitespace but everything else, e.g. comments and code.
         */
        public readonly Range $range,
        /**
         * The range that should be selected and revealed when this symbol is
         * being picked, e.g. the name of a function. Must be contained by the
         * {@see TypeHierarchyItem::$range `range`}.
         */
        public readonly Range $selectionRange,
        /**
         * Tags for this item.
         *
         * @var list<SymbolTag>|null
         */
        public readonly ?array $tags = null,
        /**
         * More detail for this item, e.g. the signature of a function.
         */
        public readonly ?string $detail = null,
        /**
         * A data entry field that is preserved between a type hierarchy prepare
         * and supertypes or subtypes requests. It could also be used to
         * identify the type hierarchy in the server, helping improve the
         * performance on resolving supertypes and subtypes.
         */
        public readonly mixed $data = null,
    ) {}
}
