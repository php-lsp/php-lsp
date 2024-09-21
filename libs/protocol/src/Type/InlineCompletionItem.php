<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * An inline completion item represents a text snippet that is proposed inline
 * to complete text that is being typed.
 *
 * @since 3.18.0
 *
 * @internal This is a proposed type, which means that the implementation of
 *           this type is not final. Please use this type at your own risk.
 *
 * @generated 2024-09-21
 */
final class InlineCompletionItem
{
    public function __construct(
        /**
         * The text to replace the range with. Must be set.
         */
        public readonly string|StringValue $insertText,
        /**
         * A text that is used to decide if this inline completion should be
         * shown. When `falsy` the {@see InlineCompletionItem::$insertText} is
         * used.
         */
        public readonly ?string $filterText = null,
        /**
         * The range to replace. Must begin and end on the same line.
         */
        public readonly ?Range $range = null,
        /**
         * An optional {@link Command} that is executed *after* inserting this
         * completion.
         */
        public readonly ?Command $command = null,
    ) {}
}
