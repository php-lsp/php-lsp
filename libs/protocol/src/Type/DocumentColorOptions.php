<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class DocumentColorOptions
{
    use DocumentColorOptionsMixin;

    public function __construct(bool|null $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}