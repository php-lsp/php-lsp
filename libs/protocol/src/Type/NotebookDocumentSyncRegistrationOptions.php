<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options specific to a notebook.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class NotebookDocumentSyncRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use NotebookDocumentSyncOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    final public function __construct(array $notebookSelector, bool $save, string $id)
    {
        $this->notebookSelector = $notebookSelector;

        $this->save = $save;

        $this->id = $id;
    }
}
