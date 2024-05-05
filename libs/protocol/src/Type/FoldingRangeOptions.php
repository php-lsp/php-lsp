<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class FoldingRangeOptions
{
    use FoldingRangeOptionsMixin;

    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
