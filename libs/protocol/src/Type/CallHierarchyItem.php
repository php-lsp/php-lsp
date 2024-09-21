<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents programming constructs like functions or constructors in the
 * context of call hierarchy.
 *
 * @since 3.16.0
 *
 * @generated 2024-09-21
 */
final class CallHierarchyItem
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
         * being picked, e.g. the name of a function.
         * Must be contained by the {@see CallHierarchyItem::$range `range`}.
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
         * A data entry field that is preserved between a call hierarchy prepare
         * and incoming calls or outgoing calls requests.
         */
        public readonly mixed $data = null,
    ) {}
}
