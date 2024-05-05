<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class MonikerOptions
{
    use MonikerOptionsMixin;

    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
