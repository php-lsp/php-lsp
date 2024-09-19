<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class LinkedEditingRangeOptions
{
    use LinkedEditingRangeOptionsMixin;

    public function __construct(bool|null $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}