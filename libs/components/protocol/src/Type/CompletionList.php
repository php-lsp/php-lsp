<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Represents a collection of {@link CompletionItem completion items} to be
 * presented in the editor.
 */
final class CompletionList
{
    public function __construct(
        /**
         * This list it not complete. Further typing results in recomputing this
         * list.
         *
         * Recomputed lists have all their items replaced (not appended) in the
         * incomplete completion sessions.
         */
        public readonly bool $isIncomplete,
        /**
         * In many cases the items of an actual completion result share the same
         * value for properties like `commitCharacters` or the range of a text
         * edit. A completion list can therefore define item defaults which will
         * be used if a completion item itself doesn't specify the value.
         *
         * If a completion list specifies a default value and a completion item
         * also specifies a corresponding value the one from the item is used.
         *
         * Servers are only allowed to return default values if the client
         * signals support for this via the `completionList.itemDefaults`
         * capability.
         *
         * @since 3.17.0
         */
        public readonly ?CompletionItemDefaults $itemDefaults = null,
        /**
         * The completion items.
         *
         * @var list<CompletionItem>
         */
        public readonly array $items = [],
    ) {}
}
