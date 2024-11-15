<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options specific to a notebook.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-15
 */
final class NotebookDocumentSyncRegistrationOptions
{
    public function __construct(
        /**
         * The notebooks to be synced.
         *
         * @var list<NotebookDocumentFilterWithNotebook|NotebookDocumentFilterWithCells>
         */
        public readonly array $notebookSelector = [],
        /**
         * Whether save notification should be forwarded to the server. Will
         * only be honored if mode === `notebook`.
         */
        public readonly ?bool $save = null,
        /**
         * The id used to register the request. The id can be used to deregister
         * the request again. See also Registration#id.
         */
        public readonly ?string $id = null,
    ) {}
}
