<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Notebook specific client capabilities.
 *
 * @since 3.17.0
 *
 * @generated 2024-09-21
 */
final class NotebookDocumentSyncClientCapabilities
{
    public function __construct(
        /**
         * Whether implementation supports dynamic registration. If this is set
         * to `true` the client supports the new
         * `(TextDocumentRegistrationOptions & StaticRegistrationOptions)`
         * return value for the corresponding server capability as well.
         */
        public readonly ?bool $dynamicRegistration = null,
        /**
         * The client supports sending execution summary data per cell.
         */
        public readonly ?bool $executionSummarySupport = null,
    ) {}
}
