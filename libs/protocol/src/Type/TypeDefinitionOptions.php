<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class TypeDefinitionOptions
{
    use TypeDefinitionOptionsMixin;

    function __construct(bool $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}