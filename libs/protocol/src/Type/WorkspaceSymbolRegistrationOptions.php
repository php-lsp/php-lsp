<?php

namespace Lsp\Protocol\Type;

/**
 * Registration options for a {@link WorkspaceSymbolRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
final class WorkspaceSymbolRegistrationOptions
{
    use WorkspaceSymbolOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    final public function __construct(bool $resolveProvider, bool $workDoneProgress)
    {
        $this->resolveProvider = $resolveProvider;

        $this->workDoneProgress = $workDoneProgress;
    }
}
