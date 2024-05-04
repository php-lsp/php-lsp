<?php

namespace Lsp\Protocol\Type;

/**
 * The params sent in an open notebook document notification.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class DidOpenNotebookDocumentParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     * @param list<TextDocumentItem> $cellTextDocuments
     */
    final public function __construct(
        public readonly NotebookDocument $notebookDocument,
        public readonly array $cellTextDocuments,
    ) {}
}
