<?php

namespace Lsp\Protocol\Type;

/**
 * Notebook specific client capabilities.
 *
 * @generated
 * @since 3.17.0
 */
final class NotebookDocumentSyncClientCapabilities
{
    final public function __construct(
        public readonly bool|null $dynamicRegistration = null,
        public readonly bool|null $executionSummarySupport = null,
    ) {}
}