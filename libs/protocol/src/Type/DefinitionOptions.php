<?php

namespace Lsp\Protocol\Type;

/**
 * Server Capabilities for a {@link DefinitionRequest}.
 *
 * @generated
 */
class DefinitionOptions
{
    use DefinitionOptionsMixin;

    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
