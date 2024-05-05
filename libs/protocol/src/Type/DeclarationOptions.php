<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class DeclarationOptions
{
    use DeclarationOptionsMixin;

    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
