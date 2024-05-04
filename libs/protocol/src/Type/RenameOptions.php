<?php

namespace Lsp\Protocol\Type;

/**
 * Provider options for a {@link RenameRequest}.
 *
 * @generated 2024-05-04T17:58:12+00:00
 */
class RenameOptions
{
    use RenameOptionsMixin;

    /**
     * @generated 2024-05-04T17:58:12+00:00
     */
    public function __construct(bool $prepareProvider, bool $workDoneProgress)
    {
        $this->prepareProvider = $prepareProvider;

        $this->workDoneProgress = $workDoneProgress;
    }
}
