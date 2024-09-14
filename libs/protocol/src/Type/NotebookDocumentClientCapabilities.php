<?php

namespace Lsp\Protocol\Type;

/**
 * Capabilities specific to the notebook document support.
 *
 * @generated
 *
 * @since 3.17.0
 */
final class NotebookDocumentClientCapabilities
{
    final public function __construct(
        public readonly NotebookDocumentSyncClientCapabilities $synchronization,
    ) {}
}
