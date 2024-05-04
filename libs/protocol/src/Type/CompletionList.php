<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a collection of {@link CompletionItem completion items} to be presented
 * in the editor.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class CompletionList
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @param list<CompletionItem> $items
     */
    final public function __construct(
        public readonly bool $isIncomplete,
        public readonly object $itemDefaults,
        public readonly array $items,
    ) {}
}
