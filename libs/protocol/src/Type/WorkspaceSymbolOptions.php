<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Server capabilities for a {@link WorkspaceSymbolRequest}.
 *
 * @generated 2024-11-15
 */
final class WorkspaceSymbolOptions
{
    public function __construct(
        /**
         * The server provides support to resolve additional information for a
         * workspace symbol.
         *
         * @since 3.17.0
         */
        public readonly ?bool $resolveProvider = null,
        public readonly ?bool $workDoneProgress = null,
    ) {}
}
