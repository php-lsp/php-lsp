<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents a collection of {@link InlineCompletionItem inline completion
 * items} to be presented in the editor.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 */
final class InlineCompletionList
{
    public function __construct(
        /**
         * The inline completion items.
         *
         * @var list<InlineCompletionItem>
         */
        public readonly array $items = [],
    ) {}
}
