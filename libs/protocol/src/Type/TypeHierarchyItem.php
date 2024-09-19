<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 * @since 3.17.0
 */
final class TypeHierarchyItem
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