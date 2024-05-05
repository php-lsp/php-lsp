<?php

namespace Lsp\Protocol\Type;

/**
 * The params sent in a save notebook document notification.
 *
 * @generated
 * @since 3.17.0
 */
final class DidSaveNotebookDocumentParams
{
    /**
     * @generated
     * @since 3.17.0
     */
    final public function __construct(
        public readonly NotebookDocumentIdentifier $notebookDocument,
    ) {}
}
