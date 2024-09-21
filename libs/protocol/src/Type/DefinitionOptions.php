<?php

declare(strict_types=1);

namespace Lsp\Protocol\Type;

/**
 * Server Capabilities for a {@link DefinitionRequest}.
 *
 * @generated 2024-09-21
 */
final class DefinitionOptions
{
    use DefinitionOptionsMixin;

    public function __construct(?bool $workDoneProgress = null)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
