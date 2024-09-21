<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The params sent in an open notebook document notification.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class DidOpenNotebookDocumentParams
{
    public function __construct(
        /**
         * The notebook document that got opened.
         */
        public readonly NotebookDocument $notebookDocument,
        /**
         * The text documents that represent the content of a notebook cell.
         *
         * @var list<TextDocumentItem>
         */
        public readonly array $cellTextDocuments = [],
    ) {}
}
