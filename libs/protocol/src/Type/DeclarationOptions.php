<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class DeclarationOptions
{
    use DeclarationOptionsMixin;

    function __construct(bool $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}