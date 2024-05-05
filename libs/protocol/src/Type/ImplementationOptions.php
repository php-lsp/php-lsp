<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class ImplementationOptions
{
    use ImplementationOptionsMixin;

    function __construct(bool $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}