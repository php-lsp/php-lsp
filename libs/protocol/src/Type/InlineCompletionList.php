<?php

namespace Lsp\Protocol\Type;

/**
 * Represents a collection of {@link InlineCompletionItem inline completion items} to be presented in the editor.
 *
 * @generated
 * @since 3.18.0
 * @internal Describes the upcoming version of the Language Server Protocol and is under development
 */
final class InlineCompletionList
{
    /**
     * @generated
     * @since 3.18.0
     * @internal Describes the upcoming version of the Language Server Protocol and is under development
     * @param list<InlineCompletionItem> $items
     */
    final public function __construct(
        public readonly array $items,
    ) {}
}
