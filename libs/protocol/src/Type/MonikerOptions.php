<?php

namespace Lsp\Protocol\Type;

/**
 * @generated
 */
class MonikerOptions
{
    use MonikerOptionsMixin;

    public function __construct(bool|null $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}