<?php

namespace Lsp\Protocol\Type;

/**
 * Reference options.
 *
 * @generated
 */
class ReferenceOptions
{
    use ReferenceOptionsMixin;

    public function __construct(bool|null $workDoneProgress)
    {
            $this->workDoneProgress = $workDoneProgress;
    }
}