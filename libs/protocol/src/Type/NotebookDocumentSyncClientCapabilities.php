<?php

namespace Lsp\Protocol\Type;

/**
 * Notebook specific client capabilities.
 *
 * @generated 2024-05-04T17:58:12+00:00
 * @since 3.17.0
 */
final class NotebookDocumentSyncClientCapabilities
{
    /**
     * @generated 2024-05-04T17:58:12+00:00
     * @since 3.17.0
     */
    final public function __construct(
        public readonly bool $dynamicRegistration,
        public readonly bool $executionSummarySupport,
    ) {}
}
