<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class FoldingRangeOptions
{
    use FoldingRangeOptionsMixin;

    function __construct(bool $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}