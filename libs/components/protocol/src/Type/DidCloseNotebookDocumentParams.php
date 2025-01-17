<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The params sent in a close notebook document notification.
 *
 * @since 3.17.0
 */
final class DidCloseNotebookDocumentParams
{
    public function __construct(
        /**
         * The notebook document that got closed.
         */
        public readonly NotebookDocumentIdentifier $notebookDocument,
        /**
         * The text documents that represent the content of a notebook cell that
         * got closed.
         *
         * @var list<TextDocumentIdentifier>
         */
        public readonly array $cellTextDocuments = [],
    ) {}
}
