<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link WorkspaceSymbolRequest}.
 */
final class WorkspaceSymbolRegistrationOptions
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
