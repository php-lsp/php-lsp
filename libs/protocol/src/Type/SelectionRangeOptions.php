<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class SelectionRangeOptions
{
    use SelectionRangeOptionsMixin;

    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
