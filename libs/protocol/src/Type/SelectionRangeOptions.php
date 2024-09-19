<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class SelectionRangeOptions
{
    use SelectionRangeOptionsMixin;

    public function __construct(bool|null $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}