<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * The params sent in a save notebook document notification.
 *
 * @since 3.17.0
 */
final class DidSaveNotebookDocumentParams
{
    public function __construct(
        /**
         * The notebook document that got saved.
         */
        public readonly NotebookDocumentIdentifier $notebookDocument,
    ) {}
}
