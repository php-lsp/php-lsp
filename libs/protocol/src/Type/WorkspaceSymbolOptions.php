<?php

namespace Lsp\Protocol\Type;

/**
 * Server capabilities for a {@link WorkspaceSymbolRequest}.
 *
 * @generated
 */
class WorkspaceSymbolOptions
{
    use WorkspaceSymbolOptionsMixin;

    public function __construct(bool|null $resolveProvider, bool|null $workDoneProgress)
    {
            $this->resolveProvider = $resolveProvider;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}