<?php

namespace Lsp\Protocol\Type;

/**
 * Server capabilities for a {@link WorkspaceSymbolRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class WorkspaceSymbolOptions
{
    use WorkspaceSymbolOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    public function __construct(bool $resolveProvider, bool $workDoneProgress)
    {
        $this->resolveProvider = $resolveProvider;

        $this->workDoneProgress = $workDoneProgress;
    }
}
