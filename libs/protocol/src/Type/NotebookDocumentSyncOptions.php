<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Options specific to a notebook plus its cells to be synced to the server.
 *
 * If a selector provides a notebook document filter but no cell selector all
 * cells of a matching notebook document will be synced.
 *
 * If a selector provides no notebook document filter but only a cell selector
 * all notebook document that contain at least one matching cell will be synced.
 *
 * @since 3.17.0
 *
 * @generated 2024-11-15
 */
final class NotebookDocumentSyncOptions
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
    ) {}
}
