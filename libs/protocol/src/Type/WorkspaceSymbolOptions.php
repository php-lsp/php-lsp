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

    function __construct(bool $resolveProvider, bool $workDoneProgress)
    {
            $this->resolveProvider = $resolveProvider;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}