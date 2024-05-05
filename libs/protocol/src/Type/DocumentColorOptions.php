<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class DocumentColorOptions
{
    use DocumentColorOptionsMixin;

    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
