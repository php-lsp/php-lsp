<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options specific to a notebook.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class NotebookDocumentSyncRegistrationOptions
{
    use NotebookDocumentSyncOptionsMixin;
    use StaticRegistrationOptionsMixin;

    /**
     * @param list<NotebookDocumentSyncOptionsNotebookSelector>
     *        $notebookSelector The notebooks to be synced
     * @param bool|null $save Whether save notification should be forwarded to
     *        the server. Will only be honored if mode === `notebook`.
     * @param string|null $id The id used to register the request. The id can be
     *        used to deregister the request again. See also Registration#id.
     */
    public function __construct(array $notebookSelector = [], ?bool $save = null, ?string $id = null)
    {
        $this->notebookSelector = $notebookSelector;
        $this->save = $save;
        $this->id = $id;
    }
}
