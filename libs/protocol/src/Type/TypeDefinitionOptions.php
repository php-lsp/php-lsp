<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class TypeDefinitionOptions
{
    use TypeDefinitionOptionsMixin;

    public function __construct(bool|null $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}