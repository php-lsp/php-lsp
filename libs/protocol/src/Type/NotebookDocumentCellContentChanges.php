<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Content changes to a cell in a notebook document.
 *
 * @since 3.18.0
 */
final class NotebookDocumentCellContentChanges
{
    public function __construct(
        public readonly VersionedTextDocumentIdentifier $document,
        /**
         * @var list<TextDocumentContentChangePartial|TextDocumentContentChangeWholeDocument>
         */
        public readonly array $changes = [],
    ) {}
}
