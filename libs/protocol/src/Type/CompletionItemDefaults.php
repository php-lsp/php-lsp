<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * In many cases the items of an actual completion result share the same value
 * for properties like `commitCharacters` or the range of a text edit. A
 * completion list can therefore define item defaults which will be used if a
 * completion item itself doesn't specify the value.
 *
 * If a completion list specifies a default value and a completion item also
 * specifies a corresponding value the one from the item is used.
 *
 * Servers are only allowed to return default values if the client signals
 * support for this via the `completionList.itemDefaults` capability.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-15
 */
final class CompletionItemDefaults
{
    public function __construct(
        /**
         * A default commit character set.
         *
         * @since 3.17.0
         *
         * @var list<string>|null
         */
        public readonly ?array $commitCharacters = null,
        /**
         * A default edit range.
         *
         * @since 3.17.0
         */
        public readonly Range|EditRangeWithInsertReplace|null $editRange = null,
        /**
         * A default insert text format.
         *
         * @since 3.17.0
         */
        public readonly ?InsertTextFormat $insertTextFormat = null,
        /**
         * A default insert text mode.
         *
         * @since 3.17.0
         */
        public readonly ?InsertTextMode $insertTextMode = null,
        /**
         * A default data value.
         *
         * @since 3.17.0
         */
        public readonly mixed $data = null,
    ) {}
}
