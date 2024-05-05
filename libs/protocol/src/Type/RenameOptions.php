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

    /**
     * @generated
     */
    public function __construct(bool $prepareProvider, bool $workDoneProgress)
    {
        $this->prepareProvider = $prepareProvider;

        $this->workDoneProgress = $workDoneProgress;
    }
}
