<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a collection of {@link CompletionItem completion items} to be presented
 * in the editor.
 *
 * @generated
 */
final class CompletionList
{
    /**
     * @param list<CompletionItem> $items
     */
    final public function __construct(
        public readonly bool $isIncomplete,
        public readonly array $items,
        public readonly CompletionListItemDefaults|null $itemDefaults = null,
    ) {}
}