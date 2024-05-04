<?php

namespace Lsp\Protocol\Type;

/**
 * The params sent in a change notebook document notification.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class DidChangeNotebookDocumentParams
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    final public function __construct(
        public readonly VersionedNotebookDocumentIdentifier $notebookDocument,
        public readonly NotebookDocumentChangeEvent $change,
    ) {}
}
