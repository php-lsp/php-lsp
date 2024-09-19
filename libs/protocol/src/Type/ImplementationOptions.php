<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class ImplementationOptions
{
    use ImplementationOptionsMixin;

    public function __construct(bool|null $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}