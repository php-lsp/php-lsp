<?php

namespace Lsp\Protocol\Type;

/**
 * The params sent in a change notebook document notification.
 *
 * @generated
 * @since 3.17.0
 */
final class DidChangeNotebookDocumentParams
{
    final public function __construct(
        public readonly VersionedNotebookDocumentIdentifier $notebookDocument,
        public readonly NotebookDocumentChangeEvent $change,
    ) {}
}