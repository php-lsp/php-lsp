<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Describes textual changes on a text document. A TextDocumentEdit describes
 * all changes on a document version Si and after they are applied move the
 * document to version Si+1.
 * So the creator of a TextDocumentEdit doesn't need to sort the array of edits
 * or do any kind of ordering. However the edits must be non overlapping.
 */
final class TextDocumentEdit
{
    public function __construct(
        /**
         * The text document to change.
         */
        public readonly OptionalVersionedTextDocumentIdentifier $textDocument,
        /**
         * The edits to be applied.
         *
         * client capability.
         *
         *
         * client capability.
         *
         * @since 3.18.0 - support for SnippetTextEdit. This is guarded using a
         *        client capability.
         *
         * @var list<TextEdit|AnnotatedTextEdit|SnippetTextEdit>
         */
        public readonly array $edits = [],
    ) {}
}
