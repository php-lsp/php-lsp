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

    final public function __construct(bool|null $resolveProvider = null, bool|null $workDoneProgress = null)
    {
            $this->resolveProvider = $resolveProvider;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}