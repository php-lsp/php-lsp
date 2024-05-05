<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
abstract class WorkDoneProgressOptions
{
    use WorkDoneProgressOptionsMixin;

    /**
     * @generated
     */
    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
