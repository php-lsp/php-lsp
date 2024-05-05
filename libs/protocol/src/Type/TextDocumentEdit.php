<?php

namespace Lsp\Protocol\Type;

/**
 * Describes textual changes on a text document. A TextDocumentEdit describes all changes
 * on a document version Si and after they are applied move the document to version Si+1.
 * So the creator of a TextDocumentEdit doesn't need to sort the array of edits or do any
 * kind of ordering. However the edits must be non overlapping.
 *
 * @generated
 */
final class TextDocumentEdit
{
    /**
     * @param list<TextEdit|AnnotatedTextEdit> $edits
     */
    final public function __construct(
        public readonly OptionalVersionedTextDocumentIdentifier $textDocument,
        public readonly array $edits,
    ) {}
}