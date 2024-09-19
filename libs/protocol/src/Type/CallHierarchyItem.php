<?php

namespace Lsp\Protocol\Type;

/**
 * Represents programming constructs like functions or constructors in the context
 * of call hierarchy.
 *
 * @generated
 * @since 3.16.0
 */
final class CallHierarchyItem
{
    /**
     * @param list<SymbolTag>|null $tags
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly string $name,
        public readonly SymbolKind $kind,
        public readonly string $uri,
        public readonly Range $range,
        public readonly Range $selectionRange,
        public readonly array|null $tags = null,
        public readonly string|null $detail = null,
        public readonly mixed $data = null,
    ) {}
}