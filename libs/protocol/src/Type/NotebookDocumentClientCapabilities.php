<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Capabilities specific to the notebook document support.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class NotebookDocumentClientCapabilities
{
    public function __construct(
        /**
         * Capabilities specific to notebook document synchronization.
         *
         * @since 3.17.0
         */
        public readonly NotebookDocumentSyncClientCapabilities $synchronization,
    ) {}
}
