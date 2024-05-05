<?php

namespace Lsp\Protocol\Type;

/**
 * The params sent in a close notebook document notification.
 *
 * @generated
 * @since 3.17.0
 */
final class DidCloseNotebookDocumentParams
{
    /**
     * @param list<TextDocumentIdentifier> $cellTextDocuments
     */
    final public function __construct(
        public readonly NotebookDocumentIdentifier $notebookDocument,
        public readonly array $cellTextDocuments,
    ) {}
}
