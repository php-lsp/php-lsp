<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Server capabilities for a {@link WorkspaceSymbolRequest}.
 *
 * @generated 2024-09-21
 */
final class WorkspaceSymbolOptions
{
    use WorkspaceSymbolOptionsMixin;

    /**
     * @param bool|null $resolveProvider the server provides support to resolve
     *        additional information for a workspace symbol
     */
    public function __construct(?bool $resolveProvider = null, ?bool $workDoneProgress = null)
    {
        $this->resolveProvider = $resolveProvider;
        $this->workDoneProgress = $workDoneProgress;
    }
}
