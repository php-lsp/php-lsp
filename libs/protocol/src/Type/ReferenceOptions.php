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

    /**
     * @generated
     */
    public function __construct(bool $workDoneProgress)
    {
        $this->workDoneProgress = $workDoneProgress;
    }
}
