<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link WorkspaceSymbolRequest}.
 *
 * @generated
 */
final class WorkspaceSymbolRegistrationOptions
{
    use WorkspaceSymbolOptionsMixin;

    final public function __construct(bool $resolveProvider, bool $workDoneProgress)
    {
            $this->resolveProvider = $resolveProvider;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}