<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
abstract class WorkDoneProgressOptions
{
    use WorkDoneProgressOptionsMixin;

    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
