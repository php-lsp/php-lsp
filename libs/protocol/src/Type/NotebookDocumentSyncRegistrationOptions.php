<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options specific to a notebook.
 *
 * @generated
 * @since 3.17.0
 */
final class NotebookDocumentSyncRegistrationOptions
{
    use StaticRegistrationOptionsMixin;

    use NotebookDocumentSyncOptionsMixin;

    /**
     * @generated
     * @since 3.17.0
     * @param list<object> $notebookSelector
     */
    final public function __construct(array $notebookSelector, bool $save, string $id)
    {
        $this->notebookSelector = $notebookSelector;

        $this->save = $save;

        $this->id = $id;
    }
}
