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
     * @generated
     * @param list<CompletionItemTag> $tags
     * @param list<TextEdit> $additionalTextEdits
     * @param list<string> $commitCharacters
     */
    final public function __construct(
        public readonly string $label,
        public readonly CompletionItemLabelDetails $labelDetails,
        public readonly CompletionItemKind $kind,
        public readonly array $tags,
        public readonly string $detail,
        public readonly string|MarkupContent $documentation,
        public readonly bool $deprecated,
        public readonly bool $preselect,
        public readonly string $sortText,
        public readonly string $filterText,
        public readonly string $insertText,
        public readonly InsertTextFormat $insertTextFormat,
        public readonly InsertTextMode $insertTextMode,
        public readonly TextEdit|InsertReplaceEdit $textEdit,
        public readonly string $textEditText,
        public readonly array $additionalTextEdits,
        public readonly array $commitCharacters,
        public readonly Command $command,
        public readonly mixed $data,
    ) {}
}
