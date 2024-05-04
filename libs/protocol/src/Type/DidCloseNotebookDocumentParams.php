<?php

namespace Lsp\Protocol\Type;

/**
 * The params sent in a close notebook document notification.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class DidCloseNotebookDocumentParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     * @param list<TextDocumentIdentifier> $cellTextDocuments
     */
    final public function __construct(
        public readonly NotebookDocumentIdentifier $notebookDocument,
        public readonly array $cellTextDocuments,
    ) {}
}
