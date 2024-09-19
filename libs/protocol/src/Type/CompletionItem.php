<?php

namespace Lsp\Protocol\Type;

/**
 * A completion item represents a text snippet that is
 * proposed to complete text that is being typed.
 *
 * @generated
 */
final class CompletionItem
{
    /**
     * @param list<CompletionItemTag>|null $tags
     * @param list<TextEdit>|null $additionalTextEdits
     * @param list<string>|null $commitCharacters
     */
    final public function __construct(
        public readonly string $label,
        public readonly CompletionItemLabelDetails|null $labelDetails = null,
        public readonly CompletionItemKind|null $kind = null,
        public readonly array|null $tags = null,
        public readonly string|null $detail = null,
        public readonly string|MarkupContent|null $documentation = null,
        public readonly bool|null $deprecated = null,
        public readonly bool|null $preselect = null,
        public readonly string|null $sortText = null,
        public readonly string|null $filterText = null,
        public readonly string|null $insertText = null,
        public readonly InsertTextFormat|null $insertTextFormat = null,
        public readonly InsertTextMode|null $insertTextMode = null,
        public readonly TextEdit|InsertReplaceEdit|null $textEdit = null,
        public readonly string|null $textEditText = null,
        public readonly array|null $additionalTextEdits = null,
        public readonly array|null $commitCharacters = null,
        public readonly Command|null $command = null,
        public readonly mixed $data = null,
    ) {}
}