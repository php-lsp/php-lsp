<?php

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link RenameRequest}.
 *
 * @generated
 */
class RenameOptions
{
    use RenameOptionsMixin;

    public function __construct(bool|null $prepareProvider, bool|null $workDoneProgress)
    {
            $this->prepareProvider = $prepareProvider;
    
            $this->workDoneProgress = $workDoneProgress;
    }
}