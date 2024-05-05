<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class DocumentColorOptions
{
    use DocumentColorOptionsMixin;

    function __construct(bool $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}