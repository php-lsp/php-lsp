<?php

namespace Lsp\Protocol\Type;

/**
 * The params sent in an open notebook document notification.
 *
 * @generated
 * @since 3.17.0
 */
final class DidOpenNotebookDocumentParams
{
    /**
     * @generated
     * @since 3.17.0
     * @param list<TextDocumentItem> $cellTextDocuments
     */
    final public function __construct(
        public readonly NotebookDocument $notebookDocument,
        public readonly array $cellTextDocuments,
    ) {}
}
