<?php

namespace Lsp\Protocol\Type;

/**
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class TypeHierarchyItem
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     * @param list<SymbolTag> $tags
     * @param non-empty-string $uri
     */
    final public function __construct(
        public readonly string $name,
        public readonly SymbolKind $kind,
        public readonly array $tags,
        public readonly string $detail,
        public readonly string $uri,
        public readonly Range $range,
        public readonly Range $selectionRange,
        public readonly mixed $data,
    ) {}
}
