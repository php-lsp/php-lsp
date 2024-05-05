<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class TypeDefinitionOptions
{
    use TypeDefinitionOptionsMixin;

    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
