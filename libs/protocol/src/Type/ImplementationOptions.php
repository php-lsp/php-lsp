<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class ImplementationOptions
{
    use ImplementationOptionsMixin;

    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
