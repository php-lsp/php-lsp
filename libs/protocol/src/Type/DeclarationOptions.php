<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class DeclarationOptions
{
    use DeclarationOptionsMixin;

    public function __construct(bool|null $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}