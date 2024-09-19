<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class FoldingRangeOptions
{
    use FoldingRangeOptionsMixin;

    public function __construct(bool|null $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}