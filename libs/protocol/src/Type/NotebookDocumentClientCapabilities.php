<?php

namespace Lsp\Protocol\Type;

/**
 * Capabilities specific to the notebook document support.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class NotebookDocumentClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    final public function __construct(
        public readonly NotebookDocumentSyncClientCapabilities $synchronization,
    ) {}
}
