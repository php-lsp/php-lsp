<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class MonikerOptions
{
    use MonikerOptionsMixin;

    function __construct(bool $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}