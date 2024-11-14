<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * A completion item represents a text snippet that is proposed to complete text
 * that is being typed.
 *
 * @generated 2024-11-14
 */
final class CompletionItem
{
    public function __construct(
        /**
         * The label of this completion item.
         *
         * The label property is also by default the text that is inserted when
         * selecting this completion.
         *
         * If label details are provided the label itself should be an
         * unqualified name of the completion item.
         */
        public readonly string $label,
        /**
         * Additional details for the label.
         *
         * @since 3.17.0
         */
        public readonly ?CompletionItemLabelDetails $labelDetails = null,
        /**
         * The kind of this completion item. Based of the kind an icon is chosen
         * by the editor.
         */
        public readonly ?CompletionItemKind $kind = null,
        /**
         * Tags for this completion item.
         *
         * @since 3.15.0
         *
         * @var list<CompletionItemTag>|null
         */
        public readonly ?array $tags = null,
        /**
         * A human-readable string with additional information about this item,
         * like type or symbol information.
         */
        public readonly ?string $detail = null,
        /**
         * A human-readable string that represents a doc-comment.
         */
        public readonly string|MarkupContent|null $documentation = null,
        /**
         * Indicates if this item is deprecated.
         *
         * @deprecated use `tags` instead
         */
        public readonly ?bool $deprecated = null,
        /**
         * Select this item when showing.
         *
         * *Note* that only one completion item can be selected and that the
         * tool / client decides which item that is. The rule is that the
         * *first*
         * item of those that match best is selected.
         */
        public readonly ?bool $preselect = null,
        /**
         * A string that should be used when comparing this item with other
         * items. When `falsy` the {@see CompletionItem::$label label}
         * is used.
         */
        public readonly ?string $sortText = null,
        /**
         * A string that should be used when filtering a set of completion
         * items. When `falsy` the {@see CompletionItem::$label label}
         * is used.
         */
        public readonly ?string $filterText = null,
        /**
         * A string that should be inserted into a document when selecting this
         * completion. When `falsy` the {@see CompletionItem::$label label}
         * is used.
         *
         * The `insertText` is subject to interpretation by the client side.
         * Some tools might not take the string literally. For example VS Code
         * when code complete is requested in this example `con<cursor
         * position>` and a completion item with an `insertText` of `console` is
         * provided it will only insert `sole`. Therefore it is recommended to
         * use `textEdit` instead since it avoids additional client side
         * interpretation.
         */
        public readonly ?string $insertText = null,
        /**
         * The format of the insert text. The format applies to both the
         * `insertText` property and the `newText` property of a provided
         * `textEdit`. If omitted defaults to `InsertTextFormat.PlainText`.
         *
         * Please note that the insertTextFormat doesn't apply to
         * `additionalTextEdits`.
         */
        public readonly ?InsertTextFormat $insertTextFormat = null,
        /**
         * How whitespace and indentation is handled during completion item
         * insertion. If not provided the clients default value depends on the
         * `textDocument.completion.insertTextMode` client capability.
         *
         * @since 3.16.0
         */
        public readonly ?InsertTextMode $insertTextMode = null,
        /**
         * An {@link TextEdit edit} which is applied to a document when
         * selecting this completion. When an edit is provided the value of
         * {@see CompletionItem::$insertText insertText} is ignored.
         *
         * Most editors support two different operations when accepting a
         * completion item. One is to insert a completion text and the other is
         * to replace an existing text with a completion text. Since this can
         * usually not be predetermined by a server it can report both ranges.
         * Clients need to signal support for `InsertReplaceEdits` via the
         * `textDocument.completion.insertReplaceSupport` client capability
         * property.
         *
         * *Note 1:* The text edit's range as well as both ranges from an insert
         * replace edit must be a [single line] and they must contain the
         * position at which completion has been requested.
         * *Note 2:* If an `InsertReplaceEdit` is returned the edit's insert
         * range must be a prefix of the edit's replace range, that means it
         * must be contained and starting at the same position.
         *
         * @since 3.16.0 additional type `InsertReplaceEdit`
         */
        public readonly TextEdit|InsertReplaceEdit|null $textEdit = null,
        /**
         * The edit text used if the completion item is part of a CompletionList
         * and CompletionList defines an item default for the text edit range.
         *
         * Clients will only honor this property if they opt into completion
         * list item defaults using the capability
         * `completionList.itemDefaults`.
         *
         * If not provided and a list's default range is provided the label
         * property is used as a text.
         *
         * @since 3.17.0
         */
        public readonly ?string $textEditText = null,
        /**
         * An optional array of additional {@link TextEdit text edits} that are
         * applied when selecting this completion. Edits must not overlap
         * (including the same insert position)
         * with the main {@see CompletionItem::$textEdit edit} nor with
         * themselves.
         *
         * Additional text edits should be used to change text unrelated to the
         * current cursor position
         * (for example adding an import statement at the top of the file if the
         * completion item will insert an unqualified type).
         *
         * @var list<TextEdit>|null
         */
        public readonly ?array $additionalTextEdits = null,
        /**
         * An optional set of characters that when pressed while this completion
         * is active will accept it first and then type that character. *Note*
         * that all commit characters should have `length=1` and that
         * superfluous characters will be ignored.
         *
         * @var list<string>|null
         */
        public readonly ?array $commitCharacters = null,
        /**
         * An optional {@link Command command} that is executed *after*
         * inserting this completion. *Note* that additional modifications to
         * the current document should be described with the
         * {@see CompletionItem::$additionalTextEdits
         * additionalTextEdits}-property.
         */
        public readonly ?Command $command = null,
        /**
         * A data entry field that is preserved on a completion item between a
         * {@link CompletionRequest} and a {@link CompletionResolveRequest}.
         */
        public readonly mixed $data = null,
    ) {}
}
