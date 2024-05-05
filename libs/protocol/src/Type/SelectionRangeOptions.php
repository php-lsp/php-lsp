<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class SelectionRangeOptions
{
    use SelectionRangeOptionsMixin;

    function __construct(bool $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}