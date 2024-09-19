<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
abstract class WorkDoneProgressOptions
{
    use WorkDoneProgressOptionsMixin;

    public function __construct(bool|null $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}